<!DOCTYPE html>
<html>
<head>
	<title>Only Once</title>
</head>
<body>
	<form>
		<input type="text" name="str">
		<input type="submit" name="submit">
	</form>
	<?php
		$charactor = array();
		if(isset($_REQUEST['str'])){
			$strarray=str_split($_REQUEST['str']);
			foreach ($strarray as $value) {
				if(!in_array($value, $charactor)){
					array_push($charactor, $value);
				}
			}
			for ($i=count($charactor)-1; $i >=0 ; $i--) { 
				echo $charactor[$i];
			}
		}
	?>
</body>
</html>