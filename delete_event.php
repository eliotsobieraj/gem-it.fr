<?php
session_start();

if ($_SESSION['username'] != 'admin') {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_id = $_POST['event_id'];

    try {
        $bdd = new PDO("mysql:host=localhost;dbname=test;charset=utf8", 'root', '<Rj3!zW!FM?;\!.V');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Ajout de cette ligne pour afficher les erreurs SQL
    } catch (Exception $e) {
        echo "Erreur :" . $e->getMessage();
        exit();
    }

    $query = "DELETE FROM events WHERE id = :event_id"; // Utilisation de "id" au lieu de "event_id"
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
    $stmt->execute();

    // Rediriger vers la page de gestion des événements
    header('Location: manage_article.php');
    exit();
} else {
    // Rediriger vers la page de gestion des événements si l'accès direct à ce fichier est tenté
    header('Location: manage_article.php');
    exit();
}
