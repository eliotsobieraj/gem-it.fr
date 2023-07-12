<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
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
    <title>Ajouter un événement</title>
</head>
<body>
<?php include "header.php";?>

<div id="box">
    <form method="post" action="" enctype="multipart/form-data" class="form">
        <div>
            <h3>Ajouter un événement</h3>
        </div>
        <label for="titre_event">Titre de l'événement :</label><br>
        <input type="text" name="titre_event" id="titre_event" required><br>
        <label for="date_event">Date de l'événement :</label><br>
        <input type="date" name="date_event" id="date_event" required><br>
        <label for="pdf">Fichier PDF :</label><br>
        <input type="file" id="pdf" name="pdf" accept="application/pdf" required><br>
        <button type="submit" id="ajouter_event">Ajouter l'événement</button>
    </form>

    <?php
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=test;charset=utf8", 'root', '<Rj3!zW!FM?;\!.V');
    } catch (Exception $e) {
        echo "Erreur :" . $e->getMessage();
    }

    if (!empty($_POST['titre_event']) && !empty($_POST['date_event']) && isset($_FILES['pdf'])) {
        $titre_event = $_POST['titre_event'];
        $date_event = $_POST['date_event'];
        $pdf_name = $_FILES['pdf']['name'];
        $pdf_tmp = $_FILES['pdf']['tmp_name'];

        $pdf_location = "images/" . $pdf_name;

        if (move_uploaded_file($pdf_tmp, $pdf_location)) {
            $query = "INSERT INTO events (title, date, document) VALUES (?, ?, ?)";
            $stmt = $bdd->prepare($query);
            $stmt->bindParam(1, $titre_event);
            $stmt->bindParam(2, $date_event);
            $stmt->bindParam(3, $pdf_location);

            if ($stmt->execute()) {
                echo "<p>L'événement a été ajouté avec succès.</p>";
                echo '<a href="' . $pdf_location . '" target="_blank">Voir le document</a>';
                header("Location:index.php");
            } else {
                echo "<p>Erreur lors de l'ajout de l'événement.</p>";
            }
        } else {
            echo "<p>Erreur lors du téléchargement du document.</p>";
        }
    } else {
        echo "<p>Veuillez remplir tous les champs.</p>";
    }
    ?>
</div>
<a href="post.php">article</a>
<a href="guide_post.php">guides</a>

</body>
</html>


