<?php include('templete/header.php'); ?>

<div class="container">
	<form action="add.php" method="post">
		<div class="form-group">
			<label for="user">UserName:</label>
			<input type="text" class="form-control" name="user" id="user">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" name="pwd" id="pwd">
		</div>
		<div class="form-group">
			<label for="organisation">email:</label>
			<input type="text" class="form-control" name="email" id="email">
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>

<?php include('templete/footer.php'); ?>
