<?php
require_once("sql.php");
function getuser(){
	try{
		if(isset($_COOKEE['user']))
			return $_COOKEE['user'];
		else{
			$user;
			$db;
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
			if(isset($_REQUEST['user'])&&isset($_REQUEST['pwd'])){
				$user=$db->login($_REQUEST['user'],$_REQUEST['pwd']);
				if ($user==false) {
				    header("Location:incorrect.php");
				}
			}else{
					header("Location:incorrect.php");
			}
			$db->close();
			return $user;
		}
	}catch(Exception $e) {
		echo 'Error: ' .$e->getMessage();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
Hi <?= getuser() ?>
<div class="btn btn-default">
	<a href="logout.php">Logout</a>
</div>
</body>
</html>