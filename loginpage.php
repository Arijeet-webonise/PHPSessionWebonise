<?php include('templete/header.php'); ?>

<div class="container">
	<form action="login.php" method="post">
		<div class="form-group">
			<label for="user">UserName:</label>
			<input type="text" class="form-control" name="user" id="user">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" name="pwd" id="pwd">
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>

<?php include('templete/footer.php'); ?>
