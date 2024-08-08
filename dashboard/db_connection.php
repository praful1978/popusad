<?php
// Database connection parameters
$host = 'localhost';  // Database host
$user = 'root';  // Database username
$password = '';  // Database password

// Retrieve selected database from POST data
$selected_db = $_POST['database'];

// Create a new MySQLi instance for the selected database
$mysqli = new mysqli($host, $user, $password, $selected_db);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} else {
    // Properly escape the database name and include it in the JavaScript alert
    $escaped_db = htmlspecialchars($selected_db, ENT_QUOTES, 'UTF-8');
    echo '<script>alert("Successfully connected to the database: ' . $escaped_db . '");</script>';
    header('create_table.php');
}


?>

