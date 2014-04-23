<?php
require_once "oauth_config.php";
require_once "helpers.php";
require_once "oauth.php";

$consumer = new OAuthConsumer(CONSUMER_KEY, CONSUMER_SECRET, NULL);
$request_token = new OAuthConsumer($_COOKIE["oauth_token"], $_COOKIE["oauth_token_secret"], NULL);

$params = array("oauth_verifier" => $_GET['oauth_verifier']);
$access_token_request = OAuthRequest::from_consumer_and_token($consumer, $request_token, "GET", "https://services.planningcenteronline.com/oauth/access_token", $params);

$access_token_request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, $request_token);
$access_token_response = run_curl($access_token_request->to_url(), "GET");

parse_str($access_token_response, $access_token_request);
setcookie("oauth_token", $access_token_request['oauth_token']);
setcookie("oauth_token_secret", $access_token_request['oauth_token_secret']);

header("Location: /me.php");
?>
