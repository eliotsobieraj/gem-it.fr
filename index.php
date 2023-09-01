<?php

$session_timeout = 3;
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $host = "localhost";
    $user = "root";
    $password = "root";
    $database = "test";

    $conn = mysqli_connect($host, $user, $password, $database);


} else {
    $status = "Non connecté";
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <title>Main Page</title>
    <link rel="icon" type="image/x-icon" href="images/GEM-IT.jpg">
</head>
<body>

<script src="menu.js"></script>
</body>
</html>
