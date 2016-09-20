<!DOCTYPE html>
<html>
<head>
	<title>Books View</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h1>File Handling</h1>
<a href="addbook.php" class="btn btn-default">ADD</a><br>
<table class="table table-striped">
	<tr><th>ID</th><th>Book Name</th><th>Author</th><th>Link</th></tr>
	<?php
		require_once("books.php");
		$books=getbooks();
		foreach ($books as $book) {
			echo "<tr><td>".$book->getid()."</td><td>".$book->getbname()."</td><td>".$book->getauthor()."</td><td><a href='bookview.php?id=".$book->getid()."'  class='btn btn-default'>View</a><a href='editbooks.php?id=".$book->getid()."'  class='btn btn-default'>Edit</a></td></tr>";
		}
	?>
</table>
</body>
</html>