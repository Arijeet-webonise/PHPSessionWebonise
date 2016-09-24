<?php

$ch=curl_init();

$ifile=new CURLFILE($_FILES['image']['tmp_name'], $_FILES['image']['type'], $_FILES['image']['name']);
$xfile=new CURLFILE($_FILES['xls']['tmp_name'], $_FILES['xls']['type'], $_FILES['xls']['name']);
$cfile=new CURLFILE($_FILES['csv']['tmp_name'], $_FILES['csv']['type'], $_FILES['csv']['name']);
$data=array(
    'name' => $_REQUEST['name'],
    'email' => $_REQUEST['email'],
    'imgnum'=>  $_REQUEST['imagenum'],
    "image"=>$ifile,
    "xls"=>$xfile,
    "csv"=>$cfile
);

curl_setopt($ch, CURLOPT_URL, "localhost/PHPSessionWebonise/server.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$responce=curl_exec($ch);

if($responce){
    echo "File Posted";
}else{
    echo "CURL ERROR";
}
?>