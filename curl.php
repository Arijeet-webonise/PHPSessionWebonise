<?php
$list=array('image','xls','csv');
$ch=curl_init();

$data=array(
    'name' => $_REQUEST['name'],
    'email' => $_REQUEST['email']    
);
foreach ($list as $item) {
	if(isset($_FILES[$item]['tmp_name'])&&$_FILES[$item]['tmp_name']!=''){
		$ifile=new CURLFILE($_FILES[$item]['tmp_name'], $_FILES[$item]['type'], $_FILES[$item]['name']);
		$data[$item]=$ifile;
	}
	if(isset($_REQUEST[$item.'num'])){
		$data[$item.'num']=$_REQUEST[$item.'num'];
		for ($i=1; $i < $_REQUEST[$item.'num']; $i++) { 
			if(isset($_FILES[$item.$i]['tmp_name'])&&$_FILES[$item.$i]['tmp_name']!=''){
				$ifile=new CURLFILE($_FILES[$item.$i]['tmp_name'], $_FILES[$item.$i]['type'], $_FILES[$item.$i]['name']);
				$data[$item.$i]=$ifile;
			}
		}
	}
}


curl_setopt($ch, CURLOPT_URL, "local.testcode.com/server.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$responce=curl_exec($ch);

if($responce){
    echo "File Posted";
}else{
	echo 'Error:' . curl_error($ch);
}
?>