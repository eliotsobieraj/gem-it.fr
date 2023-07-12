<?php
$session_timeout = 3;
session_start();

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
} else {
    header("Location: login.php");
    exit();
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Données des cours</title>
    <link rel="stylesheet" href="prem-annee.css">
</head>
<body>
<a href="index.php" class="exit"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
    </svg></a>
<table>
    <thead>
    <tr>
        <th>Code</th>
        <th>Intitulé</th>
        <th>Nombre d'heures</th>
        <th>Niveau</th>
        <th>Crédits</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>5AAS</td>
        <td>Architecture complexe avec Azure et ses services</td>
        <td>16</td>
        <td>5ème année</td>
        <td>2</td>
    </tr>
    <tr>
        <td>5ASE</td>
        <td>Méthodes Agiles</td>
        <td>16</td>
        <td>5ème année</td>
        <td>5</td>
    </tr>
    <tr>
        <td>5AWS</td>
        <td>Architecture Cloud AWS</td>
        <td>16</td>
        <td>5ème année</td>
        <td>2</td>
    </tr>
    <tr>
        <td>5BLC</td>
        <td>Mise en place d’une Blockchain au sein d’une entreprise.
        </td>
        <td>16</td>
        <td>5ème année</td>
        <td>4</td>
    </tr>
    <tr>
        <td>5CFS</td>
        <td>Conception et développement de solutions Big Data</td>
        <td>16</td>
        <td>5ème année</td>
        <td>3</td>
    </tr>
    </tbody>
</table>
</body>
</html>