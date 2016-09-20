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
	
?>