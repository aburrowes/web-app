<!DOCTYPE html>
<html><body>
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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, shelfnumber, temperature, led FROM TempData ORDER BY id DESC LIMIT 1";

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>ID</td> 
        <td>Shelf Number</td> 
        <td>Temperature</td> 
        <td>LED</td> 
      </tr>';

if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $shelfnumber = $row["shelfnumber"];
        $temperature = $row["temperature"];
        $led = $row["led"];
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
      
        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $shelfnumber . '</td> 
                <td>' . $temperature . '</td> 
                <td>' . $led . '</td> 
              </tr>';
    }
    $result->free();
}

$sql = "SELECT id, shelfnumber, temperature, led FROM TempData2 ORDER BY id DESC LIMIT 1";

if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id2 = $row["id"];
        $shelfnumber2 = $row["shelfnumber"];
        $temperature2 = $row["temperature"];
        $led2 = $row["led"];
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
      
        echo '<tr> 
                <td>' . $row_id2 . '</td> 
                <td>' . $shelfnumber2 . '</td> 
                <td>' . $temperature2 . '</td> 
                <td>' . $led2 . '</td> 
              </tr>';
    }
    $result->free();
}


$conn->close();
?> 
</table>
</body>
</html>