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
		$book;
		$books=getbooks();
		foreach ($books as $tbook) {
			if(isset($_GET['id'])){
				if($_GET['id']==$tbook->getid()){
					$book=new Books($tbook->getid(),$tbook->getbname(),$tbook->getauthor());
					$book->setcontent($tbook->getcontent());
				}
			}
		}
	?>
	<h1><?= $book->getbname() ?></h1>
	<h4>By <?= $book->getauthor() ?></h4>
	<div class="well">
		<?= $book->getcontent() ?>
	</div>
</body>
</html>
