<!DOCTYPE html>
<html>
<head>
	<title>String Function</title>
</head>
<body>
<form>
	<input type="text" name="str">
	<input type="submit" name="submit">
</form>
<?php
	if (isset($_REQUEST['str'])) {
		?>String Reverse(in-build):<?php echo strrev($_REQUEST['str']);
		$array=str_split($_REQUEST['str']);
		?><br>String Reverse:<?php
		for ($i=count($array)-1; $i >= 0 ; $i--) { 
			echo $array[$i];
		}
	}
?>
</body>
</html>