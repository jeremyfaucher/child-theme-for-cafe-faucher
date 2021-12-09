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

