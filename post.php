<?php
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
    <title>Ajouter une image</title>
</head>
<body>
<?php include "header.php";?>

<div id="box">
    <form method="post" action="" enctype="multipart/form-data" class="form">
        <div>
            <h3>Photo</h3>
        </div>
        <label for="titre">Enter titre</label><br>
        <input type="text" name="titre_article" id="titre"><br>
        <label for="pseudo">Enter votre description</label><br>
        <input type="text" name="pseudo_article" id="pseudo"><br>
        <label id="picture">Choose a picture:</label><br>
        <input type="file" id="image" name="article_image" accept="image/png, image/jpeg"><br>
        <button type="submit" id="ajouter">Ajouter</button>
    </form>
    <?php
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=test;charset=utf8", 'root', '<Rj3!zW!FM?;\!.V');
    } catch (Exception $e) {
        echo "Erreur :" . $e->getMessage();
    }

    if (!empty($_POST['titre_article']) || !empty($_FILES['article_image']) || !empty($_POST['pseudo_article'])) {
        $titre_article = $_POST['titre_article'];
        $pseudo_article = $_POST['pseudo_article'];
        $tmp_image_article = $_FILES['article_image']['tmp_name'];
        $ext = pathinfo($_FILES['article_image']['name'])['extension'];
        $ext_verif = ['jpg', 'jpeg', 'png'];

        if ($_FILES['article_image']['error'] == 0 && in_array($ext, $ext_verif)) {
            $image_name = date("d-m-y") . $_FILES["article_image"]["name"];
            $image_location = "post_images/" . $image_name;
            move_uploaded_file($tmp_image_article, $image_location);

            $query = "INSERT INTO articles (title, texte, images) VALUES (?, ?, ?)";
            $stmt = $bdd->prepare($query);
            $stmt->bindParam(1, $titre_article);
            $stmt->bindParam(2, $pseudo_article);
            $stmt->bindParam(3, $image_location);

            if ($stmt->execute()) {
                echo "<p>Votre photo a été postée avec succès.</p>";

                // Display the uploaded image
                echo '<img src="' . $image_location . '" alt="Uploaded Image" style="max-width: 500px;">';

                header("Location:index.php");
            } else {
                echo "<p>Erreur lors de la publication de la photo.</p>";
            }
        } else {
            echo "<p>Erreur lors du téléchargement de l'image. Assurez-vous de choisir une image au format JPG, JPEG ou PNG.</p>";
        }
    } else {
        echo "<p>Veuillez remplir au moins un champ.</p>";
    }
    ?>
</div>
<a href="event-post.php">event</a>
<a href="guide_post.php">guides</a>
</body>
</html>
