<?php 
function getextension($text){
	for ($i=strlen($text)-1; $i >= 0; $i--) { 
		if($text[$i]=='.'){
			return substr($text, $i+1);
		}
	}
}
	if(isset($_REQUEST['submit'])){
		if(isset($_FILES['fileToUpload'])){
			$target_file = basename($_FILES["fileToUpload"]["name"]);
			$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$ext1=getextension($target_file);
		}	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SESSION 4</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div>
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
		    Select image to upload:
		    <input type="file" name="fileToUpload" id="fileToUpload">
		    <input type="submit" value="Upload Image" name="submit">
		</form>
		<div class="row container"><?= '<strong>Extention(inbuild):</strong>'.$FileType ?></div>
		<div class="row container"><?= '<strong>Extention:</strong>'.$ext1 ?></div>
	</div>
</body>
</html>