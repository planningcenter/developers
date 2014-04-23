<?php
  require_once("oauth_config.php");

  $request_token = $oauth->getRequestToken('https://services.planningcenteronline.com/oauth/request_token', CALLBACK_URL);

  $oauth_token        = $request_token['oauth_token'];
  $oauth_token_secret = $request_token['oauth_token_secret'];

  setcookie('oauth_token',        $oauth_token);
  setcookie('oauth_token_secret', $oauth_token_secret);

  header("Location: https://services.planningcenteronline.com/oauth/authorize?oauth_token=$oauth_token");
?>

