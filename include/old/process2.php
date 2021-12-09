<?php

// https://gist.github.com/maxcal/2947417

/**
 * @param string $url - the url you wish to fetch.
 * @return string - the raw html respose. 
 */
function web_scrape($url) {
    $ch = curl_init($url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
    $response = curl_exec($ch); 
    curl_close($ch); 
    
    return $response;
}

/**
 *
 * @param string $url -  the url you wish to fetch.
 * @return array - the http headers returned 
 */
function fetch_headers($url) {
    $ch = curl_init($url); 
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $response = curl_exec($ch); 
    curl_close($ch);
    return $response;
    //if ($response) return $response;
}






//function prefix_ajax_single_post() {
// https://stackoverflow.com/questions/6320113/how-to-prevent-form-resubmission-when-page-is-refreshed-f5-ctrlr

//var_dump(extension_loaded('curl'));

// Check for 202 or 404 https://stackoverflow.com/questions/408405/easy-way-to-test-a-url-for-404-in-php
/**
 * @param string $url
 * @return int
 */
// This curl is following the redirects
function findUltimateDestination($url, $maxRequests = 10) {
// if ssl in missing
//stream_context_set_default( ['ssl' => ['verify_peer' => false, 'verify_peer_name' => false, ],]);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, $maxRequests);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    //customize user agent if you desire...
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Link Checker)');
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_exec($ch);
    $url=curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    curl_close ($ch);
    //if ($url == true) return $url; 
    //return substr($url[0], 9, 3);
    return $url;
}
function getHttpResponseCode(string $url): int {

    // if ssl in missing
stream_context_set_default( ['ssl' => ['verify_peer' => false, 'verify_peer_name' => false, ],]);

    $headers = get_headers($url);
    return substr($headers[0], 9, 3);

}

function remotefileSize($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
    curl_exec($ch);
    $filesize = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
    curl_close($ch);
    if ($filesize) return $filesize;
}

include('simple_html_dom.php');
ini_set("user_agent","Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0");
//$html = new simple_html_dom();
if(isset($_POST['name1'])){
//if ($_POST) { 
    $name = $_POST['name1'];
//$name = findUltimateDestination($name);
//if ($_POST and filter_var($name, FILTER_VALIDATE_URL) !== false and getHttpResponseCode($name) == '200') {
//$html = fetch_headers($name);
//if ($_POST) {
//$html = findUltimateDestination($name);
//var_dump(get_headers($name));
// echo web_scrape('https://www.google.se/');
//$html = fetch_headers($name);
// get DOM from URL or file
$html = file_get_html($name);
// Get the submited url
echo '<div class="container-nb">';
echo '<h3>'. $name .'</h3>';
echo '</div>';

echo '<div class="card-checker container">';

foreach($html->find('img') as $e) {

echo '
<div class="checker-section">
<div class="checker-wrap">';

echo '<div class="grid-1x1x1">';
echo '<div class="grid">';

//https://stackoverflow.com/questions/7468309/check-whether-url-contains-http-or-https/7468376

// We have to parse the url so we can check if it is https
$_url = parse_url($e->src);
// Check for spaces in img src and replace with %20
if (isset($_url['scheme']) == 'https'){
// Check for spaces in img src and replace with %20
$e->src = str_replace(" ", '%20', $e->src);
$filesize = $e->src;
$dimensions = $e->src;
} else {
// Check for spaces in img src and replace with %20
// $e->outertext is the whole img tag
// $e->src is the url
// $name is the base url
$e->src = str_replace(" ", '%20', $e->src);
$e->outertext = '<img src="' . $name . $e->src . '">';
$filesize = $name . '' . $e->src;
$dimensions = $name . '' . $e->src;
}
// if is https setup
// start echos
echo $e->outertext . '<br>';
echo '<p class="small">' . $e->src . '</p>';
//grid 1
echo '</div>';

// Filesize curl function
$curlfilesize = remotefileSize($filesize);
$kb = $curlfilesize /= 1000;
$kbb = round($kb,1 .''); 

if ($kbb <= 70) {
echo '
<div class="grid">
<p class="checker-heading size-text-good">
Congragulations! Your <b>image size</b> is under 70KB
</p>';
echo '<div class="checker-text"><span class="dot dot-green"></span><p class="checker-text-text checker-size">' . $kbb . 'KB</p></div>';
}

if ($kbb >= 70) {
echo '
<div class="grid">
<p class="checker-heading size-text-bad">
Your <b>image size</b> is over 70KB
</p>';

echo '<div class="checker-text"><span class="dot dot-red"></span><p class="checker-text-text checker-size">' . $kbb . 'KB</p></div>';
}
echo '<p class="checker-heading">Image Dimensions</p>';

//if (!empty($dimensions1)) {

list($width, $height) = getimagesize($dimensions);
echo '<p class="small">Width: ' . $width . 'px</p>';
echo '<p class="small">Height: ' . $height . 'px<p>';
//grid 2
echo '</div>';
//}
echo '<div class="grid">
<p class="checker-heading">Image Alt</p>';
$alt = $e->getAttribute('alt');
if (!empty($e->alt)){
    echo '<p>'.$alt.'</p>';
    } else {
    echo '<p class="missing">missing</p>';
}

echo '<p class="checker-heading">Image Title</p>';
//$title = $e->getAttribute('title');
//echo $title;
$title = $e->getAttribute('title');
if (!empty($e->title)){
    echo '<p>'.$title.'</p>';
    } else {
    echo '<p class="missing">missing</p>';
}
//grid 3
echo '</div>';
// grid 1x1x1
echo '</div>';

// grid 1x2
echo '</div>';
// checker section
echo '</div>';
}

} else {
echo('<h3 class="container">Not a valid URL</h3>');
}
//}
// checker box
echo '</div>';
//}
?>