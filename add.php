<?php
if(isset($_REQUEST['user'])&&isset($_REQUEST['pwd'])&&isset($_REQUEST['organisation'])){
	require_once("sql.php");
	$dbclass=new DBClass("phpsession",'');
	$conn=$dbclass->getconn();

	$sql = "INSERT INTO users (User, password, organisation) VALUES ('".$_REQUEST['user']."', md5('".$_REQUEST['pwd']."'), '".$_REQUEST['organisation']."');";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}else{
	echo 'Please enter the values';
}
?>