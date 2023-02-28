<!DOCTYPE html> 
<html>
<body style="background-color:white;">
<head>
  <title>Stock Page</title>
  <link rel="stylesheet" type="text/css" href="background.css">
  <div id="container">
    <a href="logout.php">Logout</a>
    <a href="esp-data.php">Past Inventory</a>
    <a href="home.php">Home</a>
  </div>
  <h1>Current Stock</h1>
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

//This will be used to display stock on each device

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

$sql = "SELECT device, stock, name, date FROM inventory WHERE device = 1 ORDER BY date DESC LIMIT 1";

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <th>Device</th> 
        <th>Stock</th> 
        <th>Name</th> 
        <th>Date</th> 
      </tr>';

if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $device = $row["device"];
        $stock = $row["stock"];
        $name = $row["name"];
        $date = $row["date"];
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
      
        echo '<tr> 
                <td>' . $device . '</td> 
                <td>' . $stock . '</td> 
                <td>' . $name . '</td> 
                <td>' . $date . '</td> 
              </tr>';
    }
    $result->free();
}

$sql = "SELECT device, stock, name, date FROM inventory WHERE device = 2 ORDER BY date DESC LIMIT 1";

if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $device2 = $row["device"];
        $stock2 = $row["stock"];
        $name2 = $row["name"];
        $date2 = $row["date"];
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
      
        echo '<tr> 
                <td>' . $device2 . '</td> 
                <td>' . $stock2 . '</td> 
                <td>' . $name2 . '</td> 
                <td>' . $date2 . '</td> 
              </tr>';
    }
    $result->free();
}


$conn->close();
?> 
</table>
</body>
</html>