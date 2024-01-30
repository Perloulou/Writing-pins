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
        header("Location: main.php");
        exit();
    ?>