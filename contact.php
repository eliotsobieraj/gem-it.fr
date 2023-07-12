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

    if (!$conn) {
        die("Échec de la connexion à la base de données : " . mysqli_connect_error());
    }

    $query = "SELECT status FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $status = $row['status'];
    } else {
        $status = "Non connecté";
    }

    mysqli_close($conn);
} else {
    $status = "Non connecté";
    header("Location: login.php");
    exit();
}
include "header.php";
include "profile.php";


// Vérifier si le formulaire est soumis
if (isset($_POST['submit'])) {
    $message = $_POST['message'];

    // Vérifier si le message n'est pas vide
    if (!empty($message)) {
        try {
            // Connexion à la base de données
            $bdd = new PDO("mysql:host=localhost;dbname=test;charset=utf8", 'root', 'root');

            // Préparer la requête d'insertion du message
            $query = "INSERT INTO message (username, message) VALUES (:username, :message)";
            $stmt = $bdd->prepare($query);

            // Liaison des valeurs aux paramètres de la requête
            $stmt->bindParam(':username', $_SESSION['username']);
            $stmt->bindParam(':message', $message);

            // Exécution de la requête
            if ($stmt->execute()) {
                echo "Le message a été enregistré avec succès.";
            } else {
                echo "Erreur lors de l'enregistrement du message.";
            }
        } catch (Exception $e) {
            echo "Erreur :" . $e->getMessage();
        }
    } else {
        echo "Veuillez saisir un message.";
    }
}
include "footer.php";
include "post_button.php";
include "manage_button.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEM-IT</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="icon" type="image/x-icon" href="images/GEM-IT.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Roboto+Condensed:wght@700&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">


</head>
<body>


<div class="contact">
<h1 class="contact-title">Envoyer un message</h1>

<form method="POST" action="" class="contact-form" >
    <textarea name="message" rows="4" cols="50" placeholder="Entrez votre message ici"></textarea>
    <br>
    <button type="submit" name="submit" class="button-envoyer">Envoyer</button>

</form>
</div>

</body>
</html>
