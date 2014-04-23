<?php
require_once "oauth.php";
require_once "helpers.php";
require_once "oauth_config.php";

$consumer = new OAuthConsumer(CONSUMER_KEY, CONSUMER_SECRET, NULL);

$params = array("oauth_callback" => CALLBACK_URL);
$request_token_request = OAuthRequest::from_consumer_and_token($consumer, NULL, "GET", "https://services.planningcenteronline.com/oauth/request_token", $params);
$request_token_request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, NULL);
$request_token_response = run_curl($request_token_request->to_url(), "GET");

parse_str($request_token_response, $request_token);
setcookie("oauth_token", $request_token["oauth_token"]);
setcookie("oauth_token_secret", $request_token["oauth_token_secret"]);

$authorization_url = "https://services.planningcenteronline.com/oauth/authorize?oauth_token=" . $request_token["oauth_token"];
header("Location: $authorization_url");
?>
