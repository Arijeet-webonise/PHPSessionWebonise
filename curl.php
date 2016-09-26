<?php
$list=array('image');
$ch=curl_init();

$data=array(
    'pname' => $_REQUEST['pname'],
    'price' => $_REQUEST['price'],
    'Description' => $_REQUEST['Description'],
);
foreach ($list as $item) {
	if(isset($_FILES[$item]['tmp_name'])&&$_FILES[$item]['tmp_name']!=''){
		$ifile=new CURLFILE($_FILES[$item]['tmp_name'], $_FILES[$item]['type'], $_FILES[$item]['name']);
		$data[$item]=$ifile;
	}
}


curl_setopt($ch, CURLOPT_URL, "local.testcode.com/addProduct.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$responce=curl_exec($ch);

if($responce){
    echo $responce;
}else{
	echo 'Error:' . curl_error($ch);
}
?>
