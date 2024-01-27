<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/form.css" rel="stylesheet">
    <link href="./css/login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
        include('variables.php');
        include('header.php');
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST["email"];
            $mdp = $_POST["mdp"];

            // Charger les utilisateurs depuis le fichier JSON
            $utilisateurs = json_decode(file_get_contents("utilisateurs.json"), true);

            // Rechercher l'utilisateur par email
            $utilisateur = null;
            foreach ($utilisateurs["utilisateurs"] as $u) {
                if ($u["email"] === $email) {
                    $utilisateur = $u;
                    break;
                }
            }

            // Vérifier le mot de passe si l'utilisateur a été trouvé
            if ($utilisateur && password_verify($mdp, $utilisateur["mdp_hash"])) {
                echo "Connexion réussie !";
            } else {
                echo "Email ou mot de passe incorrect.";
            }
        }
    ?>

    <h2>Connexion</h2>
    <form method="post" action="php/login_process.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" required>
        <br>
        <input type="submit" name="Connexion" value="Se connecter">
    </form>
    <p>Pas encore inscrit? <a href="register.php">Inscrivez-vous ici</a></p>
</body>

</html>