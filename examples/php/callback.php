<?php
  require_once("oauth_config.php");

  $access_token = $oauth->getAccessToken("https://planningcenteronline.com/oauth/access_token");

  setcookie("oauth_token",        $access_token['oauth_token']);
  setcookie("oauth_token_secret", $access_token['oauth_token_secret']);

  header("Location: me.php");
?>