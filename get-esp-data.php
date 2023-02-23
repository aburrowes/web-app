<?php

$servername = "localhost";

$dbname = "wherehouse_data";
$username = "root";
$password = "";

$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $item = $name = $weight = $tare = $date = "";

$device = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $api_key = test_input($_GET["api_key"]);
    if ($api_key == $api_key_value) {
        $device = test_input($_GET["device"]);
        
        // Set up connection to SQL
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT item FROM config WHERE device=" . $device . " ORDER BY date DESC limit 1"; 
                
        if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $item = $row["item"];
            }
            $result->free();
        }
        else {
            echo "Something went wrong 1";
        }
        
        $conn->close();

        $sql = "SELECT item, name, weight, tare FROM data WHERE item=" . $item . ""; 
        echo '<table cellspacing="5" cellpadding="5">
                <tr> 
                    <td>Item</td> 
                    <td>Name</td> 
                    <td>Weight</td> 
                    <td>Tare</td> 
                </tr>';
                
        if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $item = $row["item"];
                $name = $row["name"];
                $weight = $row["weight"];
                $tare = $row["tare"];
                
                echo '<tr>
                        <td>' . $item . '</td>
                        <td>' . $name . '</td>
                        <td>' . $weight . '</td>
                        <td>' . $tare . '</td>
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

