<?php
if(isset($_REQUEST['user'])&&isset($_REQUEST['pwd'])&&isset($_REQUEST['email'])){
	require_once("sql.php");
	if($_REQUEST['db']=='mysql')
	{
		$dbclass=new DBClass("phpsession",'');
		$conn=$dbclass->getconn();
	
		$sql = "INSERT INTO users (User, password, email) VALUES ('".$_REQUEST['user']."', md5('".$_REQUEST['pwd']."'), '".$_REQUEST['email']."');";
	
		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
		$conn->close();
	}
	else if($_REQUEST['db']=='sqlite3'){
		$db = new MyDB();
	   	if(!$db){
	    	echo $db->lastErrorMsg();
	   	} else {
	    	$sql="INSERT INTO users (id,user,password,email) VALUES (".rand().", '".$_REQUEST['user']."', '".$_REQUEST['pwd']."', '".$_REQUEST['email']."');";


  	$ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
   }
   $db->close();
	   	}
	}
	else if($_REQUEST['db']=='psql'){
		$psql=new psql();
		$db=$psql->getdb();
		$sql="INSERT INTO users (id,name,password,email) VALUES (".rand().", 'Arijeet', 'arijeet', 'arijeet@com.com');";
		// $sql="INSERT INTO users (id,user,password,email) VALUES (rand(), '".$_REQUEST['user']."', '".$_REQUEST['pwd']."', '".$_REQUEST['email']."');";
		// var_dump($psql);
		$ret = pg_query($db, $sql);
	   	if(!$ret){
	    	echo pg_last_error($db);
	   	} else {
	    	echo "Records created successfully\n";
	   	}
	   pg_close($db);
	}
}else{
	echo 'Please enter the values';
}
?>