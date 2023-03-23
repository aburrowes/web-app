<!DOCTYPE html>
<html><body>
<head>
  <title>Post Config</title>
  <link rel="stylesheet" type="text/css" href="background.css">
  <div id="container">
    <a href="logout.php">Logout</a>
    <a href="send-data.html">Send Config</a>
    <a href="home.php">Home</a>
  </div>
  
</head>
<?php //This will be used for sending configuration
//http://192.168.1.81/demo/qr-data.php?&api_key=tpmat5ab3j7f9&device=59&item=cc
/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/

$servername = "localhost";

// REPLACE with your Database name
$dbname = "wherehouse_data";
// REPLACE with Database user
$username = "root";
// REPLACE with Database user password
$password = "";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tpmat5ab3j7f9";

$api_key = $_GET['api_key'];
$device = $_GET['device'];
$item = $_GET['item'];
$date = date('Y-m-d H:i:s');

//$api_key = test_input($_POST["api_key"]);
if($api_key == $api_key_value) {
    //$device = test_input($_POST["device"]);
    //$item = test_input($_POST["item"]);
    //$led = test_input($_POST["led"]);
        
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
        
    $sql = "INSERT INTO config (device, item, date)
    VALUES ('" . $device . "', '" . $item . "', '" . $date . "')"; 
        
    if ($conn->query($sql) === TRUE) {
      echo "'<h1>New configuration for device " . $device . " received successfully!</h1>'";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
else {
    echo "Wrong API Key provided.";
}



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
</html>