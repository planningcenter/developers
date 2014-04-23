<?php
function run_curl($url, $method = 'GET', $headers = null, $postvals = null){
  $ch = curl_init($url);

  if ($method == 'GET'){
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  } else {
    $options = array(
      CURLOPT_HEADER => true,
      CURLINFO_HEADER_OUT => true,
      CURLOPT_VERBOSE => true,
      CURLOPT_HTTPHEADER => $headers,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POSTFIELDS => $postvals,
      CURLOPT_CUSTOMREQUEST => $method,
      CURLOPT_TIMEOUT => 3
      );
    curl_setopt_array($ch, $options);
  }

  $response = curl_exec($ch);
  curl_close($ch);

  return $response;
}
?>