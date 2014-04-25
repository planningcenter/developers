<?php
define('CONSUMER_KEY',        'YOUR_CONSUMER_KEY');
define('CONSUMER_SECRET',     'YOUR_CONSUMER_SECRET');

// Obtain these keys at http://accesstoken.io
define('ACCESS_TOKEN_KEY',    'YOUR_ACCESS_TOKEN_KEY');
define('ACCESS_TOKEN_SECRET', 'YOUR_ACCESS_TOKEN_SECRET');


$oauth = new OAuth(CONSUMER_KEY, CONSUMER_SECRET);
$oauth->setToken(ACCESS_TOKEN_KEY, ACCESS_TOKEN_SECRET);

$oauth->fetch("https://services.planningcenteronline.com/me.json");
$person = json_decode($oauth->getLastResponse());

printf("Hello $person->first_name");

?>