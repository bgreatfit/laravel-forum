<?php

$curl = curl_init();
$url = 'http://elearninga-z.com/ursaminor/www/runtest.php';

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec ($ch);
$info = curl_getinfo($ch);
$http_result = $info ['http_code'];
curl_close ($ch);
var_dump(json_encode($output,true));