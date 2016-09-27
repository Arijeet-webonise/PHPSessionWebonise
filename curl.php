<?php
$list=array('image');
$ch=curl_init();
switch ($method) {
	case 'checkout':
		$data=array('method'=>'checkout','cart'=>$_REQUEST["cart"]);
		break;
	case 'fetch':
		$data=array('method'=>'fetch');
		break;
	case 'update':
		$data=array('method'=>'update','pid'=>$_REQUEST['pid'],'quantity'=>$_REQUEST['quantity']);
		break;
	case 'delete':
		$data=array('method'=>'delete','pid'=>$_REQUEST['pid']);
		break;
}

curl_setopt($ch, CURLOPT_URL, "local.testcode.com/api.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$responce=curl_exec($ch);
if($responce){
    echo $responce;
}else{
	echo 'Error:' . curl_error($ch);
}
?>
