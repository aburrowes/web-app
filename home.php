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
        <h1>Hello, <?php echo $_SESSION['user_name']; ?></h1>
        <a href="logout.php">Logout</a>
    </body>
    <?php
}
else {
    header("Location: index.php");
    exit();
}