<?php

// Database connection parameters
$host = 'localhost';  // Database host
$dbname = 'popusad_yojana';  // Database name
$user = 'popusad';  // Database username
$password = 'Gl(^BWI}5I0L';  // Database password

// Create a new MySQLi instance
$mysqli = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>