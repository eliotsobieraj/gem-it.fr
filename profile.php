<?php
$session_timeout = 3;
session_start();

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
} else {
    header("Location: login.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
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
    <link rel="stylesheet" href="profil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Roboto+Condensed:wght@700&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>


<div class="profil-contain">
    <div class="profil-menu-contain">
    <div class="profil-menu-button">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
    <button id="arrow-profil-button"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16"><path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/></svg></button>
    </div>
    <div class="profil-menu">
        <a href="profilpage.php"><button class="profil-btn">Profil</button></a>
        <a href=""><button class="profil-btn don">Faire un don</button></a>
        <a href="http://campus.ecole-it.com"><button class="profil-btn">Hyperplanning</button></a>
        <a href="http://courses.ecole-it.com"><button class="profil-btn don">Cours</button></a>
        <a href="http://tools.ecole-it.com"><button class="profil-btn">Tools</button></a>
        <form action="" method="post"><button type="submit" name="logout" class="profil-btn">Logout</button>
        </form>

    </div>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
