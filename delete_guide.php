<?php
session_start();

if ($_SESSION['username'] != 'admin') {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guide_id'])) {
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=test;charset=utf8", 'root', '<Rj3!zW!FM?;\!.V');
    } catch (Exception $e) {
        echo "Erreur :" . $e->getMessage();
    }

    $guideId = $_POST['guide_id'];

    $query = "DELETE FROM guide WHERE id = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':id', $guideId);

    if ($stmt->execute()) {
        header('Location: manage_article.php');
        exit();
    } else {
        echo "Erreur lors de la suppression du guide.";
    }
} else {
    header('Location: manage_article.php');
    exit();
}
?>
