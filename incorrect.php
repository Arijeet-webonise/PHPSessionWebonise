<?php include('templete/header.php'); ?>

<div class="container">
<div class="alert alert-danger">
  <strong>ERROR!</strong> Incorrect UserID or Password.
</div>
	<form action="login.php" method="post">
		<div class="form-group">
			<label for="user">UserName:</label>
			<input type="text" class="form-control" name="user" id="user">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" name="pwd" id="pwd">
		</div>
		<div class="form-group">
			<select name="db" class="form-control">
				<option value="mysql">mysql</option>
				<option value="sqlite3">sqlite3</option>
				<option value="psql">psql</option>
			</select>
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>

<?php include('templete/footer.php'); ?>
