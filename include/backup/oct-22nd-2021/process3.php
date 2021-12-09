<?php
require_once('simple_html_dom.php');
// get images size with no ssl
function getimgsize( $url, $referer = '' ) {
    // Set headers    
    $headers = array( 'Range: bytes=0-131072' );    
    if ( !empty( $referer ) ) { array_push( $headers, 'Referer: ' . $referer ); }

  // Get remote image
  $ch = curl_init();
  curl_setopt( $ch, CURLOPT_URL, $url );
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
  curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
  $data = curl_exec( $ch );
  $http_status = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
  $curl_errno = curl_errno( $ch );
  curl_close( $ch );
    
  // Get network stauts
  if ( $http_status != 200 ) {
    //echo 'HTTP Status[' . $http_status . '] Errno [' . $curl_errno . ']';
    return [0,0];
  }

  // Process image
  $image = imagecreatefromstring( $data );
  $dims = [ imagesx( $image ), imagesy( $image ) ];
  imagedestroy($image);

  return $dims;
}

// Set image url
$url = '';

// Get image dimensions
list( $width, $heigth) = getimgsize( $url );

// Doen something?
//echo $width.' x '.$heigth;


// Get images file size
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


ini_set("user_agent","Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0");
//$html = new simple_html_dom();
if(isset($_POST['name1'])){
//if ($_POST) { 
    $url = $_POST['name1'];
}

// https://stackoverflow.com/questions/16622293/combining-curl-and-simple-html-dom

// https://stackoverflow.com/questions/11797680/getting-http-code-in-php-using-curl

//$url = 'http://www.design2seo.com';
//$url = 'https://ashleystevensdesign.com/';
$userAgent = 'Googlebot/2.1 (http://www.googlebot.com/bot.html)';
// main curl
$ch = curl_init($url);
//curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$output = curl_exec($ch);
$check = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//echo 'HTTP code: ' . $check;

if ($check == '200') {

$html = new simple_html_dom();

$html->load($output, true, false);

//$html = file_get_html($url);

// Get the submited url
echo '<div class="container-nb">';
echo '<h3>'. $url .'</h3>';
echo '</div>';

echo '<div class="card-checker container">';

foreach($html->find('img') as $e) {

    echo '
    <div class="checker-section">
    <div class="checker-wrap">';

    echo '<div class="grid-1x1x1">';
    list($width, $height) = getimgsize($e->src);
    echo '<div class="grid"><div class="png-bg" style="max-height:' . $height . 'px; max-width:' . $width . 'px;">';

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
    //grid 1a
    echo '</div>';
    echo '<p class="checker-heading">Image source:</p>';
    echo '<p class="small l-grey">' . $e->src . '</p>';
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

    list($width, $height) = getimgsize($dimensions);
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
// chech(er) else
} else {
echo('<h3 class="container">Not a valid URL</h3>');
}
// checker box
echo '</div>';

echo '<div>';


?>
<!--     $html->save();
?> -->

