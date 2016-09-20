<?php $book; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Books View</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php


	$target_dir = "books/";
		require_once("books.php");
// var_dump($_FILES);
		if(isset($_FILES['file'])){
			$target_file = $target_dir . basename($_FILES["file"]["name"]);
			$name = basename($_FILES["file"]["name"]);
			$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$str=str_split($name);
			for ($i=count($str)-1; $i >0 ; $i--) { 
				if($str[$i]=='.'){
					$name=substr($name, 0, $i);
				}
			}
			if($FileType != "txt") {
			    trigger_error("Sorry, only txt files are allowed.",E_USER_ERROR);
			    die();
			}
			$book=new Books(rand(),$name,null);
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
		    } else {
		        trigger_error("Sorry, there was an error uploading your file.",E_USER_ERROR);
		        die();
		    }
			var_dump($book);
			$book->uploadbook();
		}
	?>
</body>
</html>