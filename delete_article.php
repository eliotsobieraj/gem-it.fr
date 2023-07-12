<?php
session_start();
if ($_SESSION['username'] !== "admin") {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['article_id'])) {
        try {
            $bdd = new PDO("mysql:host=localhost;dbname=test;charset=utf8", 'root', '<Rj3!zW!FM?;\!.V');
        } catch (Exception $e) {
            echo "Erreur :" . $e->getMessage();
        }

        $articleId = $_POST['article_id'];

        $query = "DELETE FROM articles WHERE article_id = ?";
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(1, $articleId);

        if ($stmt->execute()) {
            header("Location:manage_article.php");
        } else {
            echo "Erreur lors de la suppression de l'article.";
        }
    }
}
?>
