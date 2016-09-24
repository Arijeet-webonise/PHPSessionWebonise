<?php
require_once("sql.php");
function getuser(){
	try{
		if(isset($_SESSION['USER_COOKIE']))
			return $_SESSION['USER'];
		else{
			$user;
			$db;
				$db=new MySqlDB();
				$db->connect('phpsession','','root');
			if(isset($_REQUEST['user'])&&isset($_REQUEST['pwd'])){
				$user=$db->login($_REQUEST['user'],$_REQUEST['pwd']);
				if ($user==false) {
				    header("Location:incorrect.php");
				}
				header("Location:adminpage.php");
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