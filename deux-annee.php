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
        <th>Année</th>
        <th>Crédits ECTS</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>2ALG</td>
        <td>Algorithmie avec Python</td>
        <td>40</td>
        <td>2ème année</td>
        <td>6</td>
    </tr>
    <tr>
        <td>2AMS</td>
        <td>API Rest & MicroServices</td>
        <td>32</td>
        <td>2ème année</td>
        <td>7</td>
    </tr>
    <tr>
        <td>2CPP</td>
        <td>Développement C++</td>
        <td>40</td>
        <td>2ème année</td>
        <td>5</td>
    </tr>
    <tr>
        <td>2CSP</td>
        <td>Programme C# avec le framework .NET</td>
        <td>40</td>
        <td>2ème année</td>
        <td>3</td>
    </tr>
    <tr>
        <td>2ENG</td>
        <td>Anglais Informatique, expression orale et écrite</td>
        <td>16</td>
        <td>2ème année</td>
        <td>2</td>
    </tr>
    <tr>
        <td>2FAP</td>
        <td>Projet de fin d’année</td>
        <td>0</td>
        <td>2ème année</td>
        <td>6</td>
    </tr>
    <tr>
        <td>2GCC</td>
        <td>Language C</td>
        <td>40</td>
        <td>2ème année</td>
        <td>4</td>
    </tr>
    <tr>
        <td>2GRR</td>
        <td>Gestion de réseaux et routage</td>
        <td>40</td>
        <td>2ème année</td>
        <td>3</td>
    </tr>
    <tr>
        <td>2IAW</td>
        <td>Introduction à l’administration Windows Server</td>
        <td>64</td>
        <td>2ème année</td>
        <td>6</td>
    </tr>
    <tr>
        <td>2ILI</td>
        <td>Introduction Linux</td>
        <td>32</td>
        <td>2ème année</td>
        <td>4</td>
    </tr>
    <tr>
        <td>2INE</td>
        <td>Introduction aux réseaux d’entreprises</td>
        <td>64</td>
        <td>2ème année</td>
        <td>4</td>
    </tr>
    <tr>
        <td>2LIN</td>
        <td>Administration d’infrastructure avec Linux</td>
        <td>40</td>
        <td>2ème année</td>
        <td>3</td>
    </tr>
    <tr>
        <td>2MLD</td>
        <td>Modélisation avec la norme UML2</td>
        <td>16</td>
        <td>2ème année</td>
        <td>3</td>
    </tr>
    <tr>
        <td>2MSA</td>
        <td>Conception d’infrastructure hautement disponible avec Windows Server</td>
        <td>24</td>
        <td>2ème année</td>
        <td>3</td>
    </tr>
    <tr>
        <td>2PSF</td>
        <td>Conception d’application PHP avec Symfony</td>
        <td>64</td>
        <td>2ème année</td>
        <td>6</td>
    </tr>
    </tbody>
</table>
</body>
</html>
