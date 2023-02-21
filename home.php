<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>

    <!DOCTYPE html>
    <html>
    <body style="background-color:white;">
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="background.css">
    </head>
    <body>
        <h1>Hello <?php echo $_SESSION['user_name']; ?>. Please select one of the following:</h1>
        <Left>
        <a href="logout.php">Logout</a>
        
        <Right>
        <a href="esp-data.php">Inventory</a>
        <a href="send-data.html">Send Configuration</a>
    </body>
    <?php
}
else {
    header("Location: index.php");
    exit();
}