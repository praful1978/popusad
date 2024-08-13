<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost:3306";
$username = "popusad";
$password = "Gl(^BWI}5I0L";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize user input
$database_name = isset($_POST['database_name']) ? $_POST['database_name'] : '';
$database_year = isset($_POST['database_year']) ? $_POST['database_year'] : '';
$database = $database_name . " " . $database_year; // Adjust to avoid spaces

// Escape the database name to prevent SQL injection
$database = $conn->real_escape_string($database);

// Create database
$sql = "CREATE DATABASE '$database'";
echo $sql;
if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Database Created Successfully")</script>';
} else {
    echo '<script>alert("Error in creating Database: ' . $conn->error . '")</script>';
}

// Close connection
$conn->close();
?>
