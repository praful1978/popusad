<?php

// Database connection parameters
$host = 'localhost';  // Database host
$dbname = '';  // Database name
$user = 'root';  // Database username
$password = '';  // Database password

// Create a new MySQLi instance
$mysqli = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>