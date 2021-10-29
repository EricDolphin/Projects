<?php
// This php file connects to the database for the login page and the register page.

session_start();

class config {
	
	public static function connect()
	{
		$db_user = "dynamicduo";
		$db_pass = "dynamicduopass";
		$dsn = 'mysql:host=localhost;dbname=dynamicduodatabase';
		
	// Connection is initiated between the file and the database
		try {
			$db = new PDO($dsn, $db_user, $db_pass);
			$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
			
			
		}catch(PDOException $e)
		{
			echo "Connection failed" . $e->getMessage();
		}
		
		return $db;

	}
}
?>