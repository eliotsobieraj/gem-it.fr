<?php

$session_timeout = 3;

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
} else {

    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Button</title>
    <link rel="stylesheet" type="text/css" href="delete_button.css">
</head>
<body>
<form method="post" action="manage_article.php">
    <input type="submit" value="Gestion" class="delete-btn">
</form>
</body>
</html>

