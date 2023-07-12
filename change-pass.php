<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $host = 'localhost';
    $dbname = 'test';
    $dbusername = 'root';
    $dbpassword = '<Rj3!zW!FM?;\!.V';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($newPassword === $confirmPassword) {
                // Hash the new password using SHA-256
                $hashedPassword = hash('sha256', $newPassword);

                $stmt = $pdo->prepare("UPDATE user SET password = :password WHERE username = :username");
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->bindParam(':username', $username);
                $stmt->execute();

                echo "Mot de passe modifié avec succès.";
            } else {
                echo "Les mots de passe ne correspondent pas.";
            }
        }
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title>Changer le mot de passe</title>
            <link rel="stylesheet" href="change-pass.css">
        </head>
        <body>
        <h2>Changer le mot de passe</h2>
        <form method="POST" action="">
            <label for="new_password">Nouveau mot de passe:</label>
            <input type="password" id="new_password" name="new_password" required><br><br>

            <label for="confirm_password">Confirmer le nouveau mot de passe:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br><br>

            <input type="submit" value="Changer le mot de passe">
        </form>
        </body>
        </html>

        <?php
        $pdo = null;
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
    }
} else {
    echo "L'utilisateur n'est pas connecté.";
}
?>
