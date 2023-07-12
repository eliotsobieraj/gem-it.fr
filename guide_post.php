<?php

error_reporting(E_ALL);
ob_start();
session_start();
if (($_SESSION['username'] != "admin") && ($_SESSION['username'] != "eliott.sobieraj")) {
    header('Location: index.php');
    exit();
}
ob_end_flush();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="post.css">
    <title>Ajouter un guide</title>
</head>
<body>
<?php include "header.php";?>

<div id="box">
    <form method="post" action="" enctype="multipart/form-data" class="form">
        <div>
            <h3>Ajouter un guide</h3>
        </div>
        <label for="titre">Titre :</label><br>
        <input type="text" name="titre" id="titre" required><br>
        <label for="image">Image :</label><br>
        <input type="file" id="image" name="image" accept="image/png, image/jpeg" required><br>
        <label for="pdf">Fichier PDF :</label><br>
        <input type="file" id="pdf" name="pdf" accept="application/pdf" required><br>
        <button type="submit" id="ajouter">Ajouter</button>
    </form>

    <?php
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=test;charset=utf8", 'root', '<Rj3!zW!FM?;\!.V');
    } catch (Exception $e) {
        echo "Erreur :" . $e->getMessage();
    }

    if (!empty($_POST['titre']) && !empty($_FILES['image']['name']) && !empty($_FILES['pdf']['name'])) {
        $titre = $_POST['titre'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $pdf_tmp = $_FILES['pdf']['tmp_name'];

        $image_name = $_FILES['image']['name'];
        $pdf_name = $_FILES['pdf']['name'];

        $image_location = "images/" . $image_name;
        $pdf_location = "images/" . $pdf_name;

        if (move_uploaded_file($image_tmp, $image_location) && move_uploaded_file($pdf_tmp, $pdf_location)) {
            $query = "INSERT INTO guide (title, file, image) VALUES (?, ?, ?)";
            $stmt = $bdd->prepare($query);
            $stmt->bindParam(1, $titre);
            $stmt->bindParam(2, $pdf_location);
            $stmt->bindParam(3, $image_location);

            if ($stmt->execute()) {
                echo "<p>Le guide a été ajouté avec succès.</p>";
                echo '<img src="' . $image_location . '" alt="Image du guide" style="max-width: 500px;">';
                header("Location:index.php");
            } else {
                echo "<p>Erreur lors de l'ajout du guide.</p>";
            }
        } else {
            echo "<p>Erreur lors du téléchargement de l'image ou du fichier PDF.</p>";
        }
    } else {
        echo "<p>Veuillez remplir tous les champs.</p>";
    }
    ?>
</div>
<a href="event-post.php">event</a>
<a href="post.php">article</a>

</body>
</html>
