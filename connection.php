<?php
    
    // $servername = "localhost:3306";
    // $username = "sh6ete423chsoft";
    // $password = "Er&-giv_+fcf" ;
    // $dbname = "sh6ete423chsoft_admin";
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "yojana";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>