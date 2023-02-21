<?php
// Read parameters from URL
$api_key = $_GET['api_key'];
$shelfnumber = $_GET['shelfnumber'];
$temperature = $_GET['temperature'];
$led = $_GET['led'];

// Check if API key is valid
if ($api_key != 'tPmAT5Ab3j7F9') {
    header('HTTP/1.0 401 Unauthorized');
    echo 'Invalid API key';
    exit();
}

// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esp_3866_db";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into table
$sql = "INSERT INTO TempData2 (shelfnumber, temperature, led) VALUES ('$shelfnumber', '$temperature', '$led')";
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . $conn->error;
}

// Close database connection
$conn->close();
?>