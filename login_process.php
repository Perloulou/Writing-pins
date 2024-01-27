<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion ffff</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["Connexion"])) {
            // Récupération des données du formulaire
            $email = $_POST["email"];
            $mdp = $_POST["mdp"];

            // Lecture du fichier JSON
            $utilisateurs = json_decode(file_get_contents("../utilisateurs.json"), true);

            // Vérifier si l'email existe dans le tableau
            $utilisateur = array_filter($utilisateurs, function ($user) use ($email) {
                return isset($user["email"]) && $user["email"] === $email;
            });

            if (!empty($utilisateur)) {
                // Utilisateur trouvé, vérifier le mot de passe
                $utilisateur = reset($utilisateur); // Récupérer le premier élément du tableau
                $mdpHash = $utilisateur["mdp"];

                if (password_verify($mdp, $mdpHash)) {
                    // Mot de passe correct, connexion réussie
                    include('../header.php');
                    echo "Connexion réussie. Bienvenue, " . $utilisateur["prenom"]." !<br>";
                    echo "Retourner au à la page principale: <a class='nav-link' href='../main.php'>Main</a>";
            
                } else {
                    echo "Mot de passe incorrect. Veuillez réessayer.";
                }
            } else {
                echo "L'email n'existe pas. Veuillez vous inscrire.";
            }
        }
    ?>
</body>