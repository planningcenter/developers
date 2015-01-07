<?php

require_once "oauth.php";
require_once "helpers.php";

define('CONSUMER_KEY',        'YOUR_KEY_FROM_PCO');
define('CONSUMER_SECRET',     'YOUR_SECRET_FROM_PCO');

// Obtain these keys at http://accesstoken.io
define('ACCESS_TOKEN_KEY',    'YOUR_KEY_FROM_ACCESSTOKEN.IO');
define('ACCESS_TOKEN_SECRET', 'YOUR_SECRET_FROM_ACCESSTOKEN.IO');

$oauth = new OAuthConsumer(CONSUMER_KEY, CONSUMER_SECRET, NULL);
$oauth_token = new OAuthConsumer(ACCESS_TOKEN_KEY, ACCESS_TOKEN_SECRET, NULL);

$request = OAuthRequest::from_consumer_and_token($oauth, $oauth_token, "GET", 'https://services.planningcenteronline.com/me.json', NULL);
$request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $oauth, $oauth_token);

$response = run_curl($request, "GET");

$person = json_decode($response);

printf("Hello $person->first_name");

?>