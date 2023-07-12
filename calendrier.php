
<?php

$session_timeout = 3;
session_start();

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
} else {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
    <link rel="stylesheet" href="event.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Roboto+Condensed:wght@700&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
</head>
<body>
<div class="event-container">
    <h1 class="event-title-main">Events</h1>

    <?php
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=test;charset=utf8", 'root', '<Rj3!zW!FM?;\!.V');
    } catch (Exception $e) {
        echo "Erreur :" . $e->getMessage();
    }

    $query = "SELECT * FROM events ORDER BY date ASC LIMIT 9";
    $stmt = $bdd->query($query);
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($events) > 0) {
        $closestEvent = $events[0]; // Premier événement est le plus proche
        foreach ($events as $event) {
            $eventClass = "event-card";
            if ($event === $closestEvent) {
                $eventClass .= " closest-event";
            }
            if ($event['date'] === date('Y-m-d')) {
                $eventClass .= " today-event";
            }
            echo "<div class='$eventClass'>";
            echo "<div class='event-title'>";
            echo "<h2>" . $event['title'] . "</h2>";
            echo "</div>";
            echo "<div class='event-date'>";
            echo "<p>" . $event['date'] . "</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>Aucun événement trouvé.</p>";
    }
    ?>
</div>
</body>
</html>
