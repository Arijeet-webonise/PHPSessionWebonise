<?php
if(isset($_REQUEST['user'])&&isset($_REQUEST['pwd'])&&isset($_REQUEST['email'])){
	require_once("sql.php");
	try{
		if($_REQUEST['db']=='mysql'){
			$db=new MySqlDB();
			$db->connect('phpsession','','root');
		}else if($_REQUEST['db']=='sqlite3'){
			$db = new SqlLiteDB();
			$db->connect('C:\sqlite\testDB.db');
		}else if($_REQUEST['db']=='psql'){
			$db=new PSql();
			$db->connect("dbname=testdb","1902Anchit1@3","postgres");
		}
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