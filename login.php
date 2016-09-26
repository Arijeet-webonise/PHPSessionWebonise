<?php
include('templete/header.php');
function getuser(){
	try{
		if(isset($_SESSION['USER']))
			return $_SESSION['USER'];
		else{
			$user;
			$db;
				$db=SQLFactory::create();
				$db->connect('phpsession','','root');
			if(isset($_REQUEST['user'])&&isset($_REQUEST['pwd'])){
				$user=$db->login($_REQUEST['user'],$_REQUEST['pwd']);
				if (!$user) {
				    header("Location:incorrect.php");
				}
				if($_REQUEST['user']=='admin')
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

Hi <?= getuser() ?>
<div class="btn btn-default">
	<a href="logout.php">Logout</a>
</div>

<?php include('templete/footer.php'); ?>
