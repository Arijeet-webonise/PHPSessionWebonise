<?php
	require_once('Classes/sql.php');
	require_once('Classes/fileupload.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>These is test e-commerce website</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/main.css">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">TestCode</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <?php if(!isset($_SESSION['USER'])) {?>
      <li><a href="loginpage.php">Login</a></li>
      <li><a href="adduser.php">Register</a></li>
      <?php }else{
      	?>
      <li><a href="logout.php">LogOut</a></li>
      <?php
      		if($_SESSION['USER']=='admin'){
      			?>
      <li><a href="adminpage.php">Add Product</a></li>
      			<?php
      		}
      	} ?>
    </ul>
  </div>
</nav>
