<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch list of databases
$sql = "SHOW DATABASES";
$result = $conn->query($sql);

// Prepare dropdown options
$options = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dbName = $row['Database'];
        $options .= "<option value=\"$dbName\">$dbName</option>";
    }
} else {
    $options = "<option>No databases found</option>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Database</title>
</head>
<body>
    <h1>Select Database</h1>
    <form action="process.php" method="post">
        <label for="database">Choose a database:</label>
        <select id="database" name="database" required>
            <?php echo $options; ?>
        </select>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

