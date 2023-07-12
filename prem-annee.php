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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        <th>Code matière</th>
        <th>Titre</th>
        <th>Nombre d'heures</th>
        <th>Crédits ECTS</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1ALG</td>
        <td>Algorithmie avec Python</td>
        <td>32</td>
        <td>5</td>
    </tr>
    <tr>
        <td>1ENG</td>
        <td>Anglais: Informatique, expression orale et écrite</td>
        <td>40</td>
        <td>3</td>
    </tr>
    <tr>
        <td>1FAP</td>
        <td>Projet de fin d’année</td>
        <td>0</td>
        <td>6</td>
    </tr>
    <tr>
        <td>1FEG</td>
        <td>Escape Game d’introduction</td>
        <td>4</td>
        <td>0</td>
    </tr>
    <tr>
        <td>1GCC</td>
        <td>Language C</td>
        <td>40</td>
        <td>3</td>
    </tr>
    <tr>
        <td>1GIT</td>
        <td>Versionner son projet avec GIT</td>
        <td>16</td>
        <td>2</td>
    </tr>
    <tr>
        <td>1GUI</td>
        <td>Conception d'interface graphique avec Tkinter</td>
        <td>40</td>
        <td>3</td>
    </tr>
    <tr>
        <td>1LIN</td>
        <td>Introduction Linux</td>
        <td>32</td>
        <td>5</td>
    </tr>
    <tr>
        <td>1LWH</td>
        <td>Administration d’un serveur Web avec Linux</td>
        <td>24</td>
        <td>2</td>
    </tr>
    <tr>
        <td>1MDG</td>
        <td>Management et droit général</td>
        <td>24</td>
        <td>2</td>
    </tr>
    <tr>
        <td>1MIL</td>
        <td>Mathématique informatique et logique</td>
        <td>40</td>
        <td>3</td>
    </tr>
    <tr>
        <td>1NET</td>
        <td>Introduction aux fondamentaux réseaux</td>
        <td>64</td>
        <td>5</td>
    </tr>
    <tr>
        <td>1SQL</td>
        <td>Conception et modélisation de base SQL</td>
        <td>32</td>
        <td>5</td>
    </tr>
    <tr>
        <td>1STD</td>
        <td>Stratégie digitale</td>
        <td>24</td>
        <td>2</td>
    </tr>
    <tr>
        <td>1TRE</td>
        <td>Technique de recherche à l’emploi</td>
        <td>8</td>
        <td>0</td>
    </tr>
    <tr>
        <td>1UIX</td>
        <td>Conception d’interface utilisateur</td>
        <td>16</td>
        <td>2</td>
    </tr>
    <tr>
        <td>1VRT</td>
        <td>Introduction à la virtualisation</td>
        <td>24</td>
        <td>3</td>
    </tr>
    <tr>
        <td>1WEB</td>
        <td>Développement WEB</td>
        <td>88</td>
        <td>8</td>
    </tr>
    <tr>
        <td>1WIN</td>
        <td>Administration Windows Server</td>
        <td>64</td>
        <td>6</td>
    </tr>
    </tbody>
</table>

</body>
</html>
