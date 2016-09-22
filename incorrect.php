<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
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
</body>
</html>