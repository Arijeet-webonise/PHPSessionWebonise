<!DOCTYPE html>
<html>
<head>
	<title>Edit Book</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<form action="addbooksubmit.php" class="well" method="get">
	<div class="form-group">
		<input type="number" name="id" class="form-control" placeholder="Book ID">
	</div>
	<div class="form-group">
		<input type="text" name="bname" class="form-control" placeholder="Book Name">
	</div>
	<div class="form-group">
		<input type="text" name="author" class="form-control" placeholder="Author Name">
	</div>
	<div class="form-group">
		<label>Content</label>
		<textarea name="content" cols="50" class="form-control" rows="20"></textarea>
	</div>
	<input type="submit" name="submit" class="btn btn-default">
</form>
<form action="addviaupload.php" class="well" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<input type="file" name="file" class="form-control">
		<input type="submit" name="submit" class="btn btn-default">
	</div>
</form>
</div>
</body>
</html>