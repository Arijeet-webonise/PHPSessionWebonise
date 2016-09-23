<?php

$params=['name'=>$_REQUEST['name'], 'email'=>$_REQUEST['email']];
$defaults = array(
CURLOPT_URL => 'http://local.testcode.com/', 
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => $params,
);
$ch = curl_init();
curl_setopt_array($ch, ($defaults));

?>