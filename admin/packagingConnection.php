<?php

/*
 * class is using for connect for packaging solutions database in goodscab
 */
	class packagingConnection{
		private $host = 'localhost';
		private $username = 'goodscab_admin';
		private $password = 'gCAB2015';
		private $database = 'goodscab_packagingsolutions';

		/*
		 * constructor
		 */
		function  __construct(){
			if(connection_status() == 1){
				mysql_close();
			}
			$conn = $this->connectToDatabase();
			if(!empty($conn)){
				$this->selectDatabase($conn);
			}
			
		}
		
		/*
		 * connect to database
		 */
		function connectToDatabase(){
			if(($connection = mysql_connect($this->host,$this->username,$this->password)) === false)die("could not connect database");
			return $connection;
		}
		
		/*
		 * selects the database
		 */
		function selectDatabase($connection){
			if($connection = mysql_select_db($this->database,$connection) === false)die("could not select the database");
		}
	}

?>