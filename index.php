<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
	<form action="server.php" method="post" enctype="multipart/form-data" class="well container">
		<div class="form-group">
			<label for="name">Uploader Name:</label>
			<input type="text" class="form-control" name="name" id="name">
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" name="email" id="email">
		</div>
		<div class="form-group">
			<label for="image">Image:</label>
			<div class="btn addform" id="img-add">+</div>
			<input type="hidden" name="imgnum" class="num" value="0">
			<div id="imagediv">
				<input type="file" class="form-control" name="image" id="image">
			</div>
		</div>
		<div class="form-group">
			<label for="xls">XLS:</label>
			<div id="imagediv">
				<input type="file" class="form-control" name="xls" id="xls">
			</div>
		</div>
		<div class="form-group">
			<label for="csv">CSV:</label>
			<div id="imagediv">
				<input type="file" class="form-control" name="csv" id="csv">
			</div>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-default" name="submit" id="submit">
			<button id="cancel" class="btn btn-default">Cancel</button>
		</div>
	</form>
</body>
</html>