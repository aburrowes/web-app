<?php
    //Code was helped written with https://www.simplilearn.com/tutorials/php-tutorial/php-login-form
    $sname = "localhost";
    $unmae = "root";
    $password = "";

    $db_name = "wherehouse_data";

    $conn = mysqli_connect($sname, $unmae, $password, $db_name);

    if(!$conn) {
        echo "Connection failed";
    }