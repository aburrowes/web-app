<?php

$servername = "localhost";

$dbname = "esp_3866_db";
$username = "root";
$password = "";

$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $shelfnumber = $temperature = $led = "";

$id = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $api_key = test_input($_GET["api_key"]);
    if ($api_key == $api_key_value) {
        $id = test_input($_GET["id"]);
        
        // Set up connection to SQL
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT id, shelfnumber, temperature, led FROM TempData WHERE id=" . $id . " ORDER BY id DESC"; 
        echo   '<table cellspacing="5" cellpadding="5">
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
                
                echo '<tr>
                        <td>' . $row_id . '</td>
                        <td>' . $shelfnumber . '</td>
                        <td>' . $temperature . '</td>
                        <td>' . $led . '</td>
                      </tr>';
            }
            $result->free();
        }
        else {
            echo "Something went wrong 1";
        }
        
        $conn->close();
    }
    else {
        echo "Wrong API Key";
    }
}
else {
    echo "Wrong request method, should be GET";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

