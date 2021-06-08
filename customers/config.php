<!-- PHP code to establish connection with the database -->
<?php

// Username and password(empty)
$user = 'root';
$password = '';

// Database name is customers
$database = 'customers';

$servername='localhost';
$mysqli = new mysqli($servername, $user, $password, $database);

// Checks for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

?>