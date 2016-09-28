<?php
include('templete/header.php'); 
if($_SESSION['USER']&&$_SESSION['USER']=='admin'){
	$user=$_SESSION['USER'];
}else{
	header("location:index.php");
}
?>

	<div class="container">
		<form class="well" action="curl.php" method="post" enctype="multipart/form-data">
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
			<div class="form-group">
				<label for="image">Product image:</label>
				<input type="file" class="form-control" name="image" id="image">
			</div>
			<div class="btn-group">
				<button type="Submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>

<?php include('templete/footer.php'); ?>
