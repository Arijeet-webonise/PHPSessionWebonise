<?php
require_once('sql.php');
require_once('fileupload.php');
function saveuser($name,$email){
	$sql=new MySqlDB();
	$sql->connect('phpsession','','root');
	$sql->insertdata('Users','User,email',"'".$name."','".$email."'");
}
function upload($uploader){
	$uploader->upload();
}
if(isset($_REQUEST['name'])&&isset($_REQUEST['email'])){
	try{
		saveuser($_REQUEST['name'],$_REQUEST['email']);
		upload(new ImageUploader($_FILES['image']));
	}catch(Exception $e){
		echo $e->getMessage();
	}
}
?>