<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<form action="curl.php" id="userform" name="userform" method="post" enctype="multipart/form-data" class="well container" onsubmit="return validate();">
		<div class="form-group">
			<label for="name">Uploader Name:</label>
			<input type="text" class="form-control" name="name" id="name" required>
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" name="email" id="email" required>
		</div>
		<div class="form-group">
			<label for="image">Image:</label>
			<div class="btn addform" id="img-add">+</div>
			<input type="hidden" name="imagenum" class="num" value="0">
			<div id="imagediv">
				<input type="file" class="form-control" name="image" id="image">
			</div>
		</div>
		<div class="form-group">
			<label for="xls">XLS:</label>
			<div class="btn addform" id="xls-add">+</div>
			<input type="hidden" name="xlsnum" class="num" value="0">
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
			<button type="submit" class="btn btn-default" name="submit" id="submit">Submit</button>
			<button id="cancel" class="btn btn-default">Cancel</button>
		</div>
	</form>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>