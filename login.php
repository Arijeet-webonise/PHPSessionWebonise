<?php
require_once("sql.php");
$dbclass=new DBClass("phpsession",'');
$conn=$dbclass->getconn();
	if(isset($_REQUEST['user'])&&isset($_REQUEST['pwd'])){
		$sql="SELECT * FROM users WHERE User='".$_REQUEST['user']."' AND password=md5('".$_REQUEST['pwd']."')";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    setcookie('user', $_REQUEST['user'], time() + (86400 * 30), "/"); // 86400 = 1 day
		} else {
		    header("Location:incorrect.php");
		}
	}else{
			header("Location:incorrect.php");
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
Hi <?= $_COOKIE['user'] ?>
<div class="btn btn-default">
	<a href="logout.php">Logout</a>
</div>
</body>
</html>