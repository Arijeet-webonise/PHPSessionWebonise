<?php
require_once('sql.php');
require_once('fileupload.php');
$types = array('image','xls','csv');
function saveuser($sql,$name,$email){
	$id=rand();
	$sql->insertdata('Users','id,User,email',"'$id','$name','$email'");
	return $id;
}
function uploadfile($id,$sql,$type){
	upload(new ImageUploader($_FILES[$type]),$sql,$id);
	$num=(int)$_REQUEST['imgnum'];
	for ($i=1; $i <=$num ; $i++) { 
		upload(new ImageUploader($_FILES[$type.$i]),$sql,$id);
	}
}
function upload($uploader,$sql,$id){
	$uploader->upload();
	$sql->insertdata('filedatabase','file_url,file_type,userid',"'".$uploader->getaddress()."','".$uploader->getFileType()."','".$id."'");
}
if(isset($_REQUEST['name'])&&isset($_REQUEST['email'])){
	try{
		$sql=new MySqlDB();
		$sql->connect('phpsession','','root');
		$id=saveuser($sql,$_REQUEST['name'],$_REQUEST['email']);
		foreach ($types as $type) {
			uploadfile($id,$sql,$type);
		}
	}catch(Exception $e){
		echo $e->getMessage();
	}
}
?>
