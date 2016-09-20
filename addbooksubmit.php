<?php $book; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Books View</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		require_once("books.php");
		if(isset($_REQUEST['id'])){
			$book=new Books($_REQUEST['id'],$_REQUEST['bname'],$_REQUEST['author']);
			$book->setcontent($_REQUEST['content']);
			$book->savebook();
		}
	?>
	<h1><?= $book->getbname() ?></h1>
	<h4>By <?= $book->getauthor() ?></h4>
	<div class="well">
		<?= $book->getcontent() ?>
	</div>
</body>
</html>
