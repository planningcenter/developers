<?php
require_once "oauth_config.php";
require_once "helpers.php";
require_once "oauth.php";

$consumer = new OAuthConsumer(CONSUMER_KEY, CONSUMER_SECRET, NULL);
$access_token = new OAuthConsumer($_COOKIE['oauth_token'], $_COOKIE['oauth_token_secret'], NULL);

$url = "https://services.planningcenteronline.com/me.json";
$request = OAuthRequest::from_consumer_and_token($consumer, $access_token, "GET", $url, NULL);

$request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, $access_token);

$response = run_curl($request, "GET");
$me = json_decode($response);


printf("Hello " . $me->first_name);
?>