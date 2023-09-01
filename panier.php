<?php

$session_timeout = 3;
session_start();

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
} else {
    header("Location: login.php");
    exit();
}

session_start();
$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = 'root';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

// Supprimer un article du panier
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['removeItem'])) {
        $itemId = $_POST['removeItem'];
        removeFromCart($itemId);
        header("Location:panier.php");
        exit();
    }
}

// Fonction pour supprimer un article du panier
function removeFromCart($itemId) {
    $key = array_search($itemId, $_SESSION['cart']);
    if ($key !== false) {
        unset($_SESSION['cart'][$key]);
    }
}

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    // Vérifier si la variable de session 'cart' existe, sinon la créer
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Récupérer les articles du panier depuis la base de données
    $cartItems = array();
    foreach ($_SESSION['cart'] as $itemId) {
        $query = $db->prepare("SELECT * FROM shop WHERE id = :id");
        $query->execute(array(':id' => $itemId));
        $cartItems[] = $query->fetch(PDO::FETCH_ASSOC);
    }
} else {
    header("Location: login.php");
    exit();
}

// Fonction pour générer le fichier texte du panier
function generateText($cartItems) {
    // Contenu du fichier texte
    $textContent = "Facture du panier\n\n";

    foreach ($cartItems as $item) {
        $textContent .= "Titre : " . $item['title_shop_article'] . "\n";
        $textContent .= "Prix : $" . $item['price'] . "\n";
        $textContent .= "\n";
    }

    // Calculer le prix total
    $totalPrice = array_sum(array_column($cartItems, 'price'));

    // Afficher le prix total
    $textContent .= "Total : $" . $totalPrice . "\n\n";

    // Ajouter la phrase supplémentaire
    $textContent .= "La suite des opérations se fera auprès des représentants du BDE en présentant la facture.\n";

    // Enregistrer le contenu dans un fichier
    $textFileName = 'facture.txt';
    file_put_contents($textFileName, $textContent);

    // Télécharger le fichier texte
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="' . $textFileName . '"');
    readfile($textFileName);

    // Supprimer le fichier texte
    unlink($textFileName);
}

// Générer le fichier texte du panier lors de la soumission du formulaire
// Générer le fichier texte du panier lors de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['commander'])) {
    if (empty($cartItems)) {
        echo "Le panier est vide. Veuillez ajouter des articles avant de commander.";
        exit();
    }

    generateText($cartItems);
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Panier</title>
    <link rel="stylesheet" type="text/css" href="panier.css">
</head>
<body>
<header>
    <h1>Panier</h1>
    <a href="shop.php" id="back-link">Retour à la boutique</a>
</header>

<div class="container">
    <?php foreach ($cartItems as $item) : ?>
        <div class="product">
            <img src="<?= $item['image'] ?>" alt="<?= $item['title_shop_article'] ?>">
            <h2><?= $item['title_shop_article'] ?></h2>
            <p>Prix : <?= $item['price'] ?> €</p>
            <form method="POST">
                <input type="hidden" name="removeItem" value="<?= $item['id'] ?>">
                <button class="remove-from-cart" type="submit">Supprimer du panier</button>
            </form>
        </div>
    <?php endforeach; ?>

    <div class="total">
        <p>Total : <?= array_sum(array_column($cartItems, 'price')) ?> €</p>
        <form method="POST">
            <button class="command-button" name="commander" type="submit">Commander</button>
        </form>
    </div>
</div>

<?php
include("header.php");
include("footer.php");

?>
</body>
</html>
