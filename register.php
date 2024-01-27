<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/form.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
        include('variables.php');
        include('header.php');
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"];
        $prenom = $_POST["prenom"];
        $mdp = $_POST["mdp"];

        // Hasher le mot de passe
        $mdpHash = password_hash($mdp, PASSWORD_BCRYPT);

        // Charger les utilisateurs depuis le fichier JSON
        $utilisateurs = json_decode(file_get_contents("utilisateurs.json"), true);

        // Ajouter le nouvel utilisateur
        $nouvelUtilisateur = ["email" => $email, "prenom" => $prenom, "mdp_hash" => $mdpHash];
        $utilisateurs["utilisateurs"][] = $nouvelUtilisateur;

        // Sauvegarder les utilisateurs mis à jour dans le fichier JSON
        file_put_contents("utilisateurs.json", json_encode($utilisateurs, JSON_PRETTY_PRINT));

        echo "Inscription réussie !";
        }
    ?>

    <h2>Inscription</h2>
    <form method="post" action="php/inscription_process.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>
        <br>
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" required>
        <br>
        <input type="submit" name="Inscription" value="S'inscrire">
    </form>
    <p>Déjà inscrit? <a href="login3.php">Connectez-vous ici</a></p>
</body>

</html>