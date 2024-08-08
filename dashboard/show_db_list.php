<!DOCTYPE html>
<html>
<head>
    <title>Select Database</title>
</head>
<body>
    <form method="post" action="db_connection.php">
        <label for="databases">Select a database:</label>
        <select name="database" id="databases">
            <?php
            // Database connection parameters for fetching databases
            $host = 'localhost';
            $user = 'root';
            $password = '';

            // Create a new MySQLi instance
            $mysqli = new mysqli($host, $user, $password);

            // Check connection
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            // SQL query to get the list of databases
            $sql = "SHOW DATABASES";
            $result = $mysqli->query($sql);

            if (!$result) {
                die("Error fetching databases: " . $mysqli->error);
            }

            // Generate options for the dropdown
            while ($row = $result->fetch_assoc()) {
                $database = $row['Database'];
                echo "<option value=\"$database\">$database</option>";
            }

            // Free result and close the connection
            $result->free();
            $mysqli->close();
            ?>
        </select>
        <input type="submit" value="Connect">
    </form>
</body>
</html>
