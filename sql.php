<?php
	/**
	* 
	*/
	class DBClass
	{
		private $servername;
		private $username;
		private $password;
		private $dbname;
		private $conn;

		function DBClass($db,$pass){
			$this->servername='localhost';
			$this->username='root';
			$this->password=$pass;
			$this->dbname=$db;
			// Create connection
			$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
			// Check connection
			if ($this->conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}	
		}
		function getconn(){
			return $this->conn;
		}
	}

	 class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('C:\sqlite\testDB.db');
      }
   }
	
	/**
	* 
	*/
	class psql
	{
		private $host;
	   	private $port;       
	   	private $dbname;     
	   	private $credentials;
	   	private $pdb;

		function getdb(){
			$host        = "host=127.0.0.1";
		   	$port        = "port=5432";
		   	$dbname      = "dbname=testdb";
		   	$credentials = "user=postgres password=password";

		   	$pdb = pg_connect( "$host $port $dbname $credentials"  );
		   	if(!$pdb){
		      	die ("Error : Unable to open database\n");
		   	} 
			return $pdb;
		}
	}
?>