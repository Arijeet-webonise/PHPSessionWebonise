<?php
session_start();

session_unset(); 
 
session_destroy(); 

?>
<!DOCTYPE html>
<html>
<head>
	<title>GameOver</title>
	<style type="text/css">
		img{
			width: 100%;
			height: 100vh;
		}
	</style>
</head>
<body>
<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
<img src="Assets/victory.png">
</a>
</body>
</html>
