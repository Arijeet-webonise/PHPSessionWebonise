<?php
	interface DBInterface{
		/*Connects to DataBase
		*  Parameter: DataBase Name, DB Password, DB UserID, DB Host
		*  return bool
		*/
		public function connect($db,$pass,$user,$host);
		/*Check if user and password excess
		*  Parameter: User UserID, User Password
		*  return bool
		*/
		public function login($user,$pass);
		/*create a new user
		*  Parameter: User UserID, User Password, User Email
		*  return bool
		*/
		public function register($user,$pass,$email);
		//close the DataBase Connection
		public function close();
	}

	/**
	* MySql DB Class
	*/
	class MySqlDB implements DBInterface
	{
		private $servername;
		private $username;
		private $password;
		private $dbname;
		private $conn;

		function connect($db,$pass,$user,$host='localhost'){
			$this->servername=$host;
			$this->username=$user;
			$this->password=$pass;
			$this->dbname=$db;
			// Create connection
			$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
			// Check connection
			if ($this->conn->connect_error) {
			    throw new Exception("Connection failed: " . $conn->connect_error, 1);
			}	
		}
		function register($user,$pass,$email){
			$sql = "INSERT INTO users (User, password, email) VALUES ('".$user."', md5('".$pass."'), '".$email."');";
	
			if ($this->conn->query($sql) === TRUE) {
			    return true;
			} else {
			    throw new Exception($this->conn->error, 1);
		      	return false;
			}
		}
		function login($user,$pass){
			$sql = "SELECT User FROM users WHERE User='$user' AND password=md5('$pass');";
	
			if ($this->conn->query($sql) === TRUE) {
				setcookie('user', $user, time() + (86400 * 30), "/"); // 86400 = 1 day
			    return true;
			} else {
			    throw new Exception($this->conn->error, 1);
			    return false;
			}
		}
		function close(){
			$this->conn->close();
		}
	}

	class MyDB extends SQLite3 
   {
      function __construct($db)
      {
         $this->open($db);
      }
   }

   /**
   * SQLite3 DB CLass
   */
   class SqlLiteDB implements DBInterface
   {
   		private $db;
   		function connect($db1,$pass=null,$user=null,$host=null){
   			$this->db=new MyDB($db1);
		   	if(!$this->db){
		    	throw new Exception($this->db->lastErrorMsg(), 1);
		    }
   		}
   		function register($user,$pass,$email){
			$sql="INSERT INTO users (id,user,password,email) VALUES (".rand().", '".$user."', '".$pass."', '".$email."');";
		  	$ret = $this->db->exec($sql);
		   if(!$ret){
		   		throw new Exception($this->db->lastErrorMsg(), 1);
		      	return false;
		   } else {
		      return true;
		   }
		}
		function login($user,$pass){
			$sql="SELECT user FROM users WHERE user='".$user."' AND password='".$pass."'";
			$ret = $this->db->query($sql);
			// var_dump($ret->fetchArray(SQLITE3_ASSOC));
			if ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
			    setcookie('user', $user, time() + (86400 * 30), "/"); // 86400 = 1 day
			    return $user;
			} else {
			    return false;
			}
		}
		function close(){
			$this->db->close();
		}
   }
	
	/**
	* PQSQL DB Class
	*/
	class PSql implements DBInterface
	{
		private $host;
	   	private $port;       
	   	private $dbname;     
	   	private $credentials;
	   	private $pdb;

		function connect($db="dbname=testdb",$pass="1902Anchit1@3",$user="postgres",$host="127.0.0.1"){
			$this->host        = 'host='.$host;
		   	$this->port        = "port=5432";
		   	$this->dbname      = $db;
		   	$this->credentials = "user=$user password=$pass";

		   	$this->pdb = pg_connect( "$this->host $this->port $this->dbname $this->credentials"  );
		   	if(!$this->pdb){
		   		throw new Exception("Unable to open database\n", 1);
		   	} 
		}
   		function register($user,$pass,$email){
   			$sql="INSERT INTO users (id,name,password,email) VALUES (".rand().", '".$user."', '".$pass."', '".$email."');";
			$ret = pg_query($this->pdb, $sql);
		   	if(!$ret){
		   		throw new Exception(pg_last_error($this->pdb), 1);
		   		return false;
		   	} else {
		    	return true;
		   	}
   		}
   		function login($user,$pass){
			$sql = "SELECT User FROM users WHERE User='$user' AND password=md5('$pass');";
	
			$ret = pg_query($this->pdb, $sql);
			if(!$ret){
				throw new Exception(pg_last_error($this->pdb), 1);
				return false;
			} 
			while($row = pg_fetch_row($ret)){
				setcookie('user', $user, time() + (86400 * 30), "/"); // 86400 = 1 day
		   		return true;
		   }
		   throw new Exception("User Not Found", 1);
		   return false;
		}
		function close(){
			pg_close($this->pdb);
		}
	}
?>