<?php
// PDO variables for connection
	$dsn = 'mysql:host=localhost;dbname=ICT3612_db';
	$username = 'root';
	$password = '';
	
	// Other global variables
	$db;
	
	// Connect to the database and show appropriate message when either successful or unsuccessful
	try {
		$db = new PDO($dsn, $username, $password);  	// Create PDO object
		echo '<p>You are connected to the database</p>';
	} catch (PDOException $e) {
		echo '<p>ERROR: You are NOT connected to the database</p>';
		exit();
	}
?>