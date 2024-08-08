<?php
// Database connection details
$servername = "localhost";
$username = "popusad";     // Replace with your MySQL username
$password = "Gl(^BWI}5I0L";     // Replace with your MySQL password
$dbname = "popusad_yojana";         // Replace with your database name

// $servername = "localhost";
// $username = "root";     // Replace with your MySQL username
// $password = "";     // Replace with your MySQL password
// $dbname = "popusad_yojana";         // Replace with your database name
// Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input (prevent SQL injection)
function sanitize_input($input) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars($input));
}

// Initialize variable to hold results HTML
$resultsHtml = '';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['scheme_holder'])) {
    $searchTerm = sanitize_input($_POST['scheme_holder']);

    // SQL query with prepared statement
    if (!empty($searchTerm)) {
        $sql = "SELECT * FROM anudan_yadi WHERE name LIKE ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $searchTermWildcard = "%" . $searchTerm . "%";
            $stmt->bind_param("s", $searchTermWildcard);
            $stmt->execute();
            $result = $stmt->get_result();

            // Debugging output
            echo "<p>Search Term: " . htmlspecialchars($searchTerm) . "</p>";
            echo "<p>Query: " . $sql . "</p>";


            
            if ($result->num_rows > 0) {
      
                // $resultsHtml .= '<table class="table">';
                // $resultsHtml .= '<tr><th> अ.क्र.</th><th>नाव </th><th>पोस्ट</th><th>गाव</th><th>तालुका</th><th>योजना</th><th>वर्ष</th></tr>';

                while ($row = $result->fetch_assoc()) {
                    // $resultsHtml .= '<h2 class="text-white">' . htmlspecialchars($row['patra_apatra']) . '</h2>';
                    // $resultsHtml .= '<tr>';
                    // $resultsHtml .= '<td>' . htmlspecialchars($row['sr_num']) . '</td>';
                    // $resultsHtml .= '<td>' . htmlspecialchars($row['name']) . '</td>';
                    // $resultsHtml .= '<td>' . htmlspecialchars($row['gaon']) . '</td>';
                    // $resultsHtml .= '<td>' . htmlspecialchars($row['post']) . '</td>';
                    // $resultsHtml .= '<td>' . htmlspecialchars($row['taluka']) . '</td>';
                    // $resultsHtml .= '<td>' . htmlspecialchars($row['yojana']) . '</td>';
                    // $resultsHtml .= '<td>' . htmlspecialchars($row['year']) . '</td>';
                    // $resultsHtml .= '</tr>';
                    $sr_num = htmlspecialchars($row['sr_num']);
                    $name = htmlspecialchars($row['name']);
                    $cast = htmlspecialchars($row['cast']);
                    $gaon = htmlspecialchars($row['gaon']);
                    $post = htmlspecialchars($row['post']);
                    $patra_apatra= htmlspecialchars($row['patra_apatra']);
                    $taluka = htmlspecialchars($row['taluka']);
                    $yojana = htmlspecialchars($row['yojana']);
                    $year = htmlspecialchars($row['year']);
              
                           // Generate the HTML content
                    $htmlContent = '
                    <div id="sthiti" style="font-size:18px;background-color:brown;" class="table text-white text-center">' . $name . ' यांच्या प्रस्तावाची सद्यस्थिती <br><p style="font-size:25px;background-color:brown;" class="table text-white text-center" > '. $patra_apatra. ' </p></div>
                    <table class="table">
                        <tr> <th> नाव </th> <th> जात </th> <th> गाव </th> </tr>
                        <tr> <td>१</td> <td>नाव:</td> <td>' . $name . '</td> </tr>
                        <tr> <td>२</td> <td>जात:</td> <td>' . $cast . '</td> </tr>
                        <tr> <td>३</td> <td>गाव:</td> <td>' . $gaon . '</td> </tr>
                        <tr> <td>४</td> <td>पोस्ट:</td> <td>' . $post . '</td> </tr>
                        <tr> <td>५</td> <td>तालुका:</td> <td>' . $taluka . '</td> </tr>
                        <tr> <td>७</td> <td>योजना:</td> <td>' . $yojana . '</td> </tr>
                        <tr> <td>८</td> <td>योजना वर्ष:</td> <td>' . $year . '</td> </tr>
                    </table>';
         
                }
            }
        }
    }}

// Close connection
$conn->close(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>प्रकल्प अधिकारी, एकात्मिक आदिवासी विकास प्रकल्प, पुसद जि.यवतमाळ</title>
    <link rel="icon" href="popusadsymbol.png" type="image/x-icon">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color:  rgba(5, 232, 141, 0.919);;
        }
        .form-container {
            margin-bottom: 20px;
        }
        /* .fade-in {
            opacity: 0;
            transition: opacity 2s ease-in;
        }
        .fade-in.show {
            opacity: 1;
        } */
    </style>
    <!-- Add Bootstrap and other CSS/JS files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body class="container-fluid">
    <div class="col-12 position-fixed bg-info top-0 start-0 z-1">
        <img src="popusadsymbol.png" alt="popusadsymbol" class="rounded mx-auto d-block">
        <div class="col-12 text-center bg-info text-dark fw-bolder"> प्रकल्प अधिकारी,<br>एकात्मिक आदिवासी विकास प्रकल्प, पुसद, जिल्हा-यवतमाळ </div>
    </div>

    <div id="div1" class="col-12 z-0">
        <p id="intro" class="col-12">नमस्कार, मी प्रकल्प अधिकारी, एकात्मिक आदिवासी विकास प्रकल्प, पुसद जि.यवतमाळ आपले चॅटबॉट मध्ये स्वागत करत आहे.</p>
        <p id="info" class="col-12">१. प्रकल्प अधिकारी, पुसद द्वारे कार्यान्वित योजनांची माहिती</p>
        <p id="prastavsthiti" class="col-12">२. तुमच्या प्रस्तावाची सद्यस्थिती तपासा</p>
        <div id="div4" >
        </div>

        <div class="form-container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="theForm">
            <label for="scheme_holder">लाभार्थ्याचे पूर्ण नाव :</label>
            <input type="text" id="scheme_holder" name="scheme_holder" required>
            <button type="submit">Search</button>
        </form>
        </div>
        
        <div id="resultsContainer">
            <!-- Results will be displayed here -->
<?php global $htmlContent; echo $htmlContent; ?>
        </div>
    </div>
    <script src="info.js"></script>



    <!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const elements = document.querySelectorAll('.fade-in');
        elements.forEach(el => {
            el.classList.add('show');
        });
    });
    </script> -->
</body>
</html>
