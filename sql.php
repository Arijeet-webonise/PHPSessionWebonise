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
		public function insertdata($table,$fields,$data);
		/*Check if user and password excess
		*  Parameter: User UserID, User Password
		*  return bool
		*/
		// public function getdata($table,$fields,$data);
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
		
		public function insertdata($table,$fields,$data)
		{
			$sql = "INSERT INTO $table ($fields)
			VALUES ($data)";

			if ($this->conn->query($sql) === TRUE) 
			    return true;
			throw new Exception($sql . "<br>" . $this->conn->error, 1);
		}
		public function getdata($table,$fields,$where=null){
			$sql = "SELECT $fields FROM $table";
			if($where==null){
				$sql=$sql." where $where";
			}
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				return $result;
			} else {
				throw new Exception($sql."<br> No Data Found", 1);
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
   		
   		public function insertdata($table,$fields,$data)
		{
			$sql = "INSERT INTO $table ($fields)
			VALUES ($data)";
			$ret = $db->exec($sql);
			if(!$ret){
				throw new Exception($sql."<br>".$this->db->lastErrorMsg());
				return false;
			}
			return true;
		}

		public function getdata($table,$fields,$where=null){
			$sql = "SELECT $fields FROM $table";
			if($where==null){
				$sql=$sql." where $where";
			}
			$ret = $db->query($sql);
			return $ret;
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
   		
		public function insertdata($table,$fields,$data)
		{
			$sql = "INSERT INTO $table ($fields)
			VALUES ($data)";
			$ret = pg_query($this->pdb, $sql);
			if(!$ret){
				throw new Exception($sql."<br>".pg_last_error($this->pdb));
				return false;
			} 
			return true;
		}

		public function getdata($table,$fields,$where=null){
			$sql = "SELECT $fields FROM $table";
			if(!$ret){
				throw new Exception("<br>".pg_last_error($this->pdb), 1);;
				return false;
			} 
			return $ret;
		}

		function close(){
			pg_close($this->pdb);
		}
	}
?>
