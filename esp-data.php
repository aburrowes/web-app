<!DOCTYPE html>
<html><body>
<head>
  <title>Past Inventory Page</title>
  <link rel="stylesheet" type="text/css" href="background.css">
  <div id="container">
    <a href="logout.php">Logout</a>
    <a href="inventory.php">Inventory</a>
    <a href="home.php">Home</a>
  </div>
</head>
<?php
/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/

//This will be used to display entire inventory table

$servername = "localhost";

// REPLACE with your Database name
$dbname = "wherehouse_data";
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

$sql = "SELECT device, stock, name, date FROM inventory ORDER BY date DESC";

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>Device</td> 
        <td>Stock</td> 
        <td>Name</td> 
        <td>Date & Time</td> 
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["device"];
        $stock = $row["stock"];
        $name = $row["name"];
        $led = $row["date"];
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
      
        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $stock . '</td> 
                <td>' . $name . '</td> 
                <td>' . $led . '</td> 
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>