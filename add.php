<?php
if(isset($_REQUEST['user'])&&isset($_REQUEST['pwd'])&&isset($_REQUEST['email'])){
	require_once("sql.php");
	try{
		$db=SQLFactory::createMySql('MySql');
		$db->connect('phpsession','','root');
		$connect=$db->register($_REQUEST['user'],$_REQUEST['pwd'],$_REQUEST['email']);
		if($connect){
			echo 'User Created';
		}
		$db->close();
	}catch(Exception $e) {
		echo 'Error: ' .$e->getMessage();
	}
}
?>
