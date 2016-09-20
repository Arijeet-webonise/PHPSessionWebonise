<!DOCTYPE html>
<html>
<head>
	<title>Edit Book</title>
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
<div class="container">
<form action="editbooksubmit.php" method="get">
	<div class="form-group">
		<input type="number" name="id" class="form-control" value="<?= $book->getid() ?>" disabled>
		<input type="hidden" name="id" class="form-control" value="<?= $book->getid() ?>">
	</div>
	<div class="form-group">
		<input type="text" name="bname" class="form-control" value="<?= $book->getbname() ?>">
	</div>
	<div class="form-group">
		<input type="text" name="author" class="form-control" value="<?= $book->getauthor() ?>">
	</div>
	<div class="form-group">
		<textarea name="content" cols="50" class="form-control" rows="20"><?= $book->getcontent() ?></textarea>
	</div>
	<input type="submit" name="submit" class="btn btn-default">
</form>
</div>
</body>
</html>
