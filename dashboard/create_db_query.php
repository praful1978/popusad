<?php

// $servername = "localhost";  // or your server
// $username = "root";         // your database username
// $password = "";             // your database password

$servername = "localhost";  // or your server
$username = "popusad";         // your database username
$password = "Gl(^BWI}5I0L";             // your database password
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$database_name=$_POST['database_name'];
$database_year =$_POST['database_year'];
$database = $database_name . " " . $database_year;

$database = $conn->real_escape_string($database);
// Create database
$sql = "CREATE DATABASE $database";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Database Created Successfully")</script>';
} else {
    echo '<script>alert("Error in creating Database")</script>' . $conn->error;
}

// Close connection
$conn->close();
?>
