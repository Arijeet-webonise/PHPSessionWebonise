<?php

$fields = array(
    'name' => $_POST['name'],
    'email' => $_POST['email'],
);

$fields_string=null;
foreach($fields as $key=>$value) { 
    $fields_string .= $key.'='.$value.'&'; 
}
rtrim($fields_string, '&');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'localhost/PHPSessionWebonise/server.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);


$headers = [
    'X-Apple-Tz: 0',
    'X-Apple-Store-Front: 143444,12',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Accept-Encoding: gzip, deflate',
    'Accept-Language: en-US,en;q=0.5',
    'Cache-Control: no-cache',
    'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
    'Host: localhost/PHPSessionWebonise/server.php',
    'Referer: http://localhost/PHPSessionWebonise/index.php', //Your referrer address
    'X-MicrosoftAjax: Delta=true'
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$server_output = curl_exec ($ch);

curl_close ($ch);

var_dump($server_output) ;

?>