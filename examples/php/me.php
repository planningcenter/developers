<?php
  require_once("oauth_config.php");

  $oauth->fetch("https://planningcenteronline.com/me.json");
  $person = json_decode($oauth->getLastResponse());

  printf("Hello $person->first_name");

?>
