<?php
  define("CONSUMER_KEY",    "YOUR_CONSUMER_KEY");
  define("CONSUMER_SECRET", "YOUR_CONSUMER_SECRET");
  define("CALLBACK_URL",    "YOUR_CALLBACK_URL");

  // Don't change this. This needs to run at the beginning of every request.
  $oauth = new OAuth(CONSUMER_KEY, CONSUMER_SECRET);
  $oauth->setToken($_COOKIE["oauth_token"], $_COOKIE["oauth_token_secret"]);
?>