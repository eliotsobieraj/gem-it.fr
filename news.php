<?php
$session_timeout = 3;
session_start();

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
} else {
    header("Location: login.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="news.css">
    <link rel="icon" type="image/x-icon" href="images/GEM-IT.jpg">
    <title>GEM-IT</title>
</head>
<body>

<?php
include "header.php";
include "carroussel.php";
include "list_article.php";
include "calendrier.php";
include "footer.php";
include "post_button.php";
include "profile.php";
include "manage_button.php";
?>



</body>
</html>
