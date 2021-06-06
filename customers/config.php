<!-- PHP code to establish connection
with the localserver -->
<?php

// Username is root
$user = 'root';
$password = '';

// Database name is customers
$database = 'customers';

// Server is localhost 
$servername='localhost';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
$sql = "SELECT * FROM customer_transc";
$result = $mysqli->query($sql);
$mysqli->close();
?>