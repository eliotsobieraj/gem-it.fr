<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="list_article.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Roboto+Condensed:wght@700&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>

<form method="GET" action="search_article.php" class="search-form">
    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#2f4566" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg></button>
    <input type="text" name="search" placeholder="Rechercher par titre">

</form>
<div class="searching">
<?php
include "header.php";


if (isset($_GET['search'])) {
    $search = $_GET['search'];
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=test;charset=utf8", 'root', '<Rj3!zW!FM?;\!.V');
    } catch (Exception $e) {
        echo "Erreur :" . $e->getMessage();
    }

    $query = "SELECT * FROM articles WHERE title LIKE :search";
    $stmt = $bdd->prepare($query);
    $stmt->bindValue(':search', '%' . $search . '%');
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($articles) > 0) {
        echo "<h2 class='search-title'>Résultats de la recherche pour : " . $search . "</h2>";
        echo "<div class='card-container'>";
        foreach ($articles as $article) {
            echo "<div class='card'>";
            echo "<div class='article-title'>";
            echo "<h2>" . $article['title'] . "</h2>";
            echo "</div>";
            echo "<img src='" . $article['images'] . "' alt='Image'>";
            echo "<div class='article-desc'>";
            echo "<p>" . $article['texte'] . "</p>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p>Aucun article trouvé pour : " . $search . "</p>";
    }
}


include "footer.php";
?>
</div>
</body>
</html>