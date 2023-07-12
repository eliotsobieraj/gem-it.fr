<?php

$session_timeout = 3;
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $host = "localhost";
    $user = "root";
    $password = "<Rj3!zW!FM?;\!.V";
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

<div class="header-include">
<?php include "header.php";?>
</div>
<div class="carroussel">
<?php include "carroussel.php";?></div>

<div class="phone-carroussel">
<?php include "phonecarroussel.php";?></div>


<div class="bde-include">
<?php
 include "bde-prof.php"?></div>

<?php

 include "class-list.php";
 include "manage_button.php";
 include "profile.php";
 include "guide_liste.php";
 include "tools.php";
 include "footer.php";
 include "post_button.php"; ?>


<script src="menu.js"></script>
</body>
</html>
