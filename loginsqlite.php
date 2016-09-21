<?php
require_once("sql.php");
$db=new MyDB();
	if(isset($_REQUEST['user'])&&isset($_REQUEST['pwd'])){
		$sql="SELECT * FROM users WHERE user='".$_REQUEST['user']."' AND password='".$_REQUEST['pwd']."'";
		$ret = $db->query($sql);
		// var_dump($ret->fetchArray(SQLITE3_ASSOC));
		if ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
			$user=$row['user'];
		    setcookie('user', $row['user'], time() + (86400 * 30), "/"); // 86400 = 1 day
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
Hi <?= $user ?>
<div class="btn btn-default">
	<a href="logout.php">Logout</a>
</div>
</body>
</html>