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
		$books=getbooks();
		foreach ($books as $tbook) {
			if(isset($_REQUEST['id'])){
				if($_REQUEST['id']==$tbook->getid()){
					$book=new Books($tbook->getid(),$_REQUEST['bname'],$_REQUEST['author']);
					$book->setcontent($_REQUEST['content']);
					$book->editbook();
				}
			}
		}
		// var_dump($books);
	?>
 	<h1><?= $book->getbname() ?></h1>
	<h4>By <?= $book->getauthor() ?></h4>
	<div class="well">
		<?= $book->getcontent() ?>
	</div> 
</body>
</html>