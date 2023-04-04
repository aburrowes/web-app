<?php
////Code was helped written with https://www.simplilearn.com/tutorials/php-tutorial/php-login-form
session_start();

//if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>

    <!DOCTYPE html>
    <html>
    <body style="background-color:white;">
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="background.css">
    </head>
    <body>
        <h1>Hello, welcome to Wherehouse. Please select one of the following:</h1>
        <Left>
        <a href="logout.php">Logout</a>
        
        <Right>
        <a href="inventory.php">Inventory</a>
        <a href="https://192.168.1.81/demo/send-data.html">Send Configuration</a>
    </body>
    <?php
//}
//else {
    //header("Location: index.php");
    //exit();
//}