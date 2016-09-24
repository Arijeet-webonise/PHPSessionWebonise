<!-- <?php
$user=$_SESSION['USER'];
?> -->
<!DOCTYPE html>
<html>
<head>
	<title>Product Upload</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<form class="well" action="addProduct.php" method="post">
			<div class="form-group">
				<label for="pname">Product:</label>
				<input type="text" class="form-control" name="pname" id="pname">
			</div>
			<div class="form-group">
				<label for="price">Product Price:</label>
				<input type="number" class="form-control" name="price" id="price">
			</div>
			<div class="form-group">
				<label for="Description">Product Description:</label>
				<textarea class="form-control" name="Description" id="Description" rows="5"></textarea>
			</div>
			<div class="btn-group">
				<button type="Submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</body>
</html>