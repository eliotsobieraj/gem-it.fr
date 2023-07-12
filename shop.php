<?php
session_start();

$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '<Rj3!zW!FM?;\!.V';
 include "header.php";
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

// Ajouter les articles au panier lors de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['item'])) {
        $itemId = $_POST['item'];
        addToCart($itemId);
        exit();
    }
}

// Fonction d'ajout d'article au panier
function addToCart($itemId) {

        $_SESSION['cart'][] = $itemId;
        header("Location:shop.php");
}

// Récupérer les articles de la base de données
$query = $db->query("SELECT * FROM shop");
$articles = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>GEM-IT</title>
    <link rel="icon" type="image/x-icon" href="images/GEM-IT.jpg">
    <link rel="stylesheet" type="text/css" href="shop.css">

</head>
<body>
<header>
    <h1>Boutique de vêtements</h1>
    <a href="panier.php" id="cart-link">Panier (<span id="cart-count"><?= count($_SESSION['cart']) ?></span>)</a>
</header>

<div class="container">
    <?php foreach ($articles as $article) : ?>
        <div class="product">
            <img src="<?= $article['image'] ?>" alt="">
            <h2><?= $article['title_shop_article'] ?></h2>
            <p>Prix : <?= $article['price'] ?> €</p>
            <form method="POST">
                <input type="hidden" name="item" value="<?= $article['id'] ?>">
                <button class="add-to-cart" type="submit">Ajouter au panier</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>

<?php include "footer.php"; ?>
</body>
</html>
