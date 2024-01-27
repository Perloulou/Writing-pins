<?php
/*// On prolonge la session
session_start();

// Détruire la session.
if (session_destroy()) {
    // Redirection vers la page de connexion
    header("Location: ../main.php");
    exit(); // Assurez-vous d'utiliser exit() après une redirection pour arrêter l'exécution du script

}*/?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Deconnexion</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/login.css">


</head>

<body>

    <?php
        session_start();

        // Détruire la session
        session_destroy();

        // Redirection vers la page d'accueil ou autre page après la déconnexion
        header("Location: ../login3.php");
        exit();
    ?>