<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Record</title>
</head>
<body>
    <h1>Create New Record</h1>
    <form action="create_db_query.php" method="post">
        <label for="name">योजनेचे नाव:</label>
        <input type="text" id="name" name="database_name" required>
        <label for="name">योजनेचे वर्ष:</label>
        <input type="text" id="name" name="database_year" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
