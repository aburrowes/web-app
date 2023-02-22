<?php

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
$dbname = "esp_3866_db";
// REPLACE with Database user
$username = "root";
// REPLACE with Database user password
$password = "";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $_GET['api_key'];
$shelfnumber = $_GET['shelfnumber'];
$temperature = $_GET['temperature'];
$led = $_GET['led'];

//$api_key = test_input($_POST["api_key"]);
if($api_key == $api_key_value) {
    //$shelfnumber = test_input($_POST["shelfnumber"]);
    //$temperature = test_input($_POST["temperature"]);
    //$led = test_input($_POST["led"]);
        
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
        
    $sql = "INSERT INTO TempData2 (shelfnumber, temperature, led)
    VALUES ('" . $shelfnumber . "', '" . $temperature . "', '" . $led . "')"; //This is the line with the error
        
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
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