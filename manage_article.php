<?php
session_start();

if ($_SESSION['username'] != 'admin') {
    header('Location: index.php');
    exit();
}

try {
    $bdd = new PDO("mysql:host=localhost;dbname=test;charset=utf8", 'root', '<Rj3!zW!FM?;\!.V');
} catch (Exception $e) {
    echo "Erreur :" . $e->getMessage();
}

$query = "SELECT * FROM articles";
$stmt = $bdd->query($query);
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des articles</title>
    <link rel="stylesheet" href="manage_article.css">
</head>
<body>

<?php
    include "header.php"


?>
<div class="container">
    <h1>Gestion des articles</h1>
    <?php
    if (count($articles) > 0) {
        foreach ($articles as $article) {
            echo '<div class="article">';
            echo '<h2 class="article-title">'. 'article : ' . $article['title'] . '</h2>';
            echo '<form method="post" action="delete_article.php">';
            echo '<input type="hidden" name="article_id" value="' . $article['article_id'] . '">';
            echo '<button type="submit" class="delete-btn">Supprimer</button>';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo '<p class="message">Aucun article trouvé.</p>';

    }



    $query = "SELECT * FROM events";
    $stmt = $bdd->query($query);
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h1>Gestion des events</h1>
        <?php
        if (count($events) > 0) {
            foreach ($events as $event) {
                echo '<div class="article">';
                echo '<h2 class="article-title">'.'event : ' . $event['title'] . '</h2>';
                echo '<form method="post" action="delete_event.php">';
                echo '<input type="hidden" name="event_id" value="' . $event['id'] . '">';
                echo '<button type="submit" class="delete-btn">Supprimer</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo '<p class="message">Aucun événement trouvé.</p>';
        }
    ?>


    <h1>Gestion des guides</h1>

        <?php
        $triquery = "SELECT * FROM guide";
        $stmt = $bdd->query($triquery);
        $guides = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($guides) > 0) {
            foreach ($guides as $guide) {
                echo '<div class="article">';
                echo '<h2 class="article-title">'. 'Guide : ' . $guide['title'] . '</h2>';
                echo '<form method="post" action="delete_guide.php">';
                echo '<input type="hidden" name="guide_id" value="' . $guide['id'] . '">';
                echo '<button type="submit" class="delete-btn">Supprimer</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo '<p class="message">Aucun guide trouvé.</p>';
        }
        ?>
</div>
</body>
</html>
