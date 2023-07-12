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
        <td>4ACS</td>
        <td>Azure & Cloud Services</td>
        <td>16</td>
        <td>4ème année</td>
        <td>2</td>
    </tr>
    <tr>
        <td>4AJS</td>
        <td>Conception d'application web avec AngularJS</td>
        <td>24</td>
        <td>4ème année</td>
        <td>2</td>
    </tr>
    <tr>
        <td>4ANG</td>
        <td>Anglais</td>
        <td>24</td>
        <td>4ème année</td>
        <td>3</td>
    </tr>
    <tr>
        <td>4BGD</td>
        <td>Blockchain & Gouvernance de distribution</td>
        <td>16</td>
        <td>4ème année</td>
        <td>1</td>
    </tr>
    <tr>
        <td>4BML</td>
        <td>BigData & Machine Learning</td>
        <td>16</td>
        <td>4ème année</td>
        <td>2</td>
    </tr>
    <tr>
        <td>4CRG</td>
        <td>Cryptographie</td>
        <td>16</td>
        <td>4ème année</td>
        <td>2</td>
    </tr>
    <tr>
        <td>4DMR</td>
        <td>Développement Mobile avec React Native</td>
        <td>48</td>
        <td>4ème année</td>
        <td>4</td>
    </tr>
    <tr>
        <td>4DOT</td>
        <td>Programmation avec C# et le framework .NET CORE</td>
        <td>24</td>
        <td>4ème année</td>
        <td>3</td>
    </tr>
    <tr>
        <td>4DPW</td>
        <td>DevOPS sur un Projet Web</td>
        <td>16</td>
        <td>4ème année</td>
        <td>2</td>
    </tr>
    <tr>
        <td>4DSO</td>
        <td>Stratégie des organisations</td>
        <td>24</td>
        <td>4ème année</td>
        <td>3</td>
    </tr>
    <tr>
        <td>4DVP</td>
        <td>Introduction DevOPS et Pipeline CI/CD</td>
        <td>24</td>
        <td>4ème année</td>
        <td>3</td>
    </tr>
    <tr>
        <td>4DWR</td>
        <td>Développement Web avec React</td>
        <td>32</td>
        <td>4ème année</td>
        <td>3</td>
    </tr>
    <tr>
        <td>4FWA</td>
        <td>Sécurité des réseaux et firewall</td>
        <td>24</td>
        <td>4ème année</td>
        <td>2</td>
    </tr>
    <tr>
        <td>4GEN</td>
        <td>Gouvernance d'entreprise</td>
        <td>24</td>
        <td>4ème année</td>
        <td>2</td>
    </tr>
    <tr>
        <td>4GIT</td>
        <td>Green IT</td>
        <td>8</td>
        <td>4ème année</td>
        <td>1</td>
    </tr>
    <tr>
        <td>4IAL</td>
        <td>Intelligence artificielle & réseau de neurones</td>
        <td>24</td>
        <td>4ème année</td>
        <td>3</td>
    </tr>
    <tr>
        <td>4IBM</td>
        <td>Introduction au BigData et au MachineLearning</td>
        <td>8</td>
        <td>4ème année</td>
        <td>1</td>
    </tr>
    <tr>
        <td>4IPM</td>
        <td>Initiation aux processus Métier BPMN/DMN</td>
        <td>40</td>
        <td>4ème année</td>
        <td>2</td>
    </tr>
    <tr>
        <td>4IRV</td>
        <td>Introduction à la réalité virtuelle</td>
        <td>16</td>
        <td>4ème année</td>
        <td>3</td>
    </tr>
    <tr>
        <td>4JSH</td>
        <td>Java Spring & Hibernate</td>
        <td>24</td>
        <td>4ème année</td>
        <td>3</td>
    </tr>
    <tr>
        <td>4LAW</td>
        <td>RGPD, contrats & Licenses</td>
        <td>16</td>
        <td>4ème année</td>
        <td>2</td>
    </tr>
    <tr>
        <td>4MEM</td>
        <td>Préparation au mémoire d'entreprise</td>
        <td>24</td>
        <td>4ème année</td>
        <td>1</td>
    </tr>
    <tr>
        <td>4MSO</td>
        <td>Management et Sécurité d'Office 365</td>
        <td>32</td>
        <td>4ème année</td>
        <td>2</td>
    </tr>
    <tr>
        <td>4NET</td>
        <td>VPN IPSEC</td>
        <td>24</td>
        <td>4ème année</td>
        <td>3</td>
    </tr>
    <tr>
        <td>4PIL</td>
        <td>Pilotage de projet</td>
        <td>24</td>
        <td>4ème année</td>
        <td>2</td>
    </tr>
    <tr>
        <td>4PMC</td>
        <td>Project Management avec CAPM</td>
        <td>24</td>
        <td>4ème année</td>
        <td>1</td>
    </tr>
    <tr>
        <td>4PPO</td>
        <td>Python, packaging et OpenSource</td>
        <td>16</td>
        <td>4ème année</td>
        <td>1</td>
    </tr>
    <tr>
        <td>4RVU</td>
        <td>Réalité virtuelle avec Unity</td>
        <td>24</td>
        <td>4ème année</td>
        <td>2</td>
    </tr>
    <tr>
        <td>4SEC</td>
        <td>Introduction à la Cybersécurité</td>
        <td>24</td>
        <td>4ème année</td>
        <td>2</td>
    </tr>
    <tr>
        <td>4TDC</td>
        <td>Techniques de communications</td>
        <td>16</td>
        <td>4ème année</td>
        <td>1</td>
    </tr>
    <tr>
        <td>4VRT</td>
        <td>Virtualisation en entreprise avec VMWare</td>
        <td>16</td>
        <td>4ème année</td>
        <td>3</td>
    </tr>
    <tr>
        <td>4WAF</td>
        <td>Introduction au pare-feu d'application web</td>
        <td>16</td>
        <td>4ème année</td>
        <td>2</td>
    </tr>
    </tbody>
</table>
</body>
</html>

