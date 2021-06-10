<!-- PHP code to establish connection with the database -->
<?php

// Username and password(empty)
$user = 'id17017226_root';
$password = 'G<xj!(I0g1$3RQ~0';

// Database name is customers
$database = 'id17017226_customers';

$servername='localhost';
$mysqli = new mysqli($servername, $user, $password, $database);

// Checks for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

?>