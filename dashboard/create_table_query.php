<?php
include'connection.php';
$table = $_POST['table_name'];
// SQL query to create a table




$sql = "
CREATE TABLE '$table' (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Execute the query
if ($mysqli->query($sql) === TRUE) {
    echo "Table 'my_table' created successfully.";
} else {
    echo "Error creating table: " . $mysqli->error;
}

// Close the connection
$mysqli->close();
?>
