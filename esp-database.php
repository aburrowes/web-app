<?php
  $servername = "localhost";

  // REPLACE with your Database name
  $dbname = "esp_3866_db";
  // REPLACE with Database user
  $username = "root";
  // REPLACE with Database user password
  $password = "";

  function getLastReadings() {
    global $servername, $username, $password, $dbname;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, shelfnumber, led FROM TempData order by id desc limit 1" ;
    if ($result = $conn->query($sql)) {
      return $result->fetch_assoc();
    }
    else {
      return false;
    }
    $conn->close();
  }
  ?>