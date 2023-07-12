<?php
try {


    $bdd = new PDO("mysql:host=localhost;dbname=test;charset=utf8", 'root', '<Rj3!zW!FM?;\!.V');
} catch (Exception $e) {
    echo "Erreur :" . $e->getMessage();
}

$query = "SELECT * FROM guide";
$stmt = $bdd->prepare($query);
$stmt->execute();
$guides = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="guide_liste.css">
    <title>Liste des guides</title>
</head>
<body>
<h1 class="big-guide-title">Liste des guides</h1>
<div class="big-contain-guides">
<?php foreach ($guides as $guide) : ?>
    <div class="guide-contain">
        <img src="<?= $guide['image'] ?>" alt="Image du guide" style="max-width: 500px;">
        <h2><?= $guide['title'] ?></h2>
        <a href="<?= $guide['file'] ?>" target="_blank">Voir le guide</a>
    </div>

<?php endforeach; ?>
</div>
</body>
</html>
