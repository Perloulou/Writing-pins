<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["Inscription"])) {
        // Récupérer les données du formulaire
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $mdp = $_POST["mdp"];

        // Charger les utilisateurs depuis le fichier JSON
        $utilisateurs = json_decode(file_get_contents("utilisateurs.json"), true);

        // Vérifier si l'email est déjà utilisé
        if (!emailDejaUtilise($utilisateurs, $email)) {
            // Hacher le mot de passe
            $mdpHash = password_hash($mdp, PASSWORD_BCRYPT);

            // Créer un nouvel utilisateur
            $nouvelUtilisateur = [
                "prenom" => $prenom,
                "email" => $email,
                "mdp" => $mdpHash
            ];

            // Ajouter le nouvel utilisateur à la liste
            $utilisateurs[] = $nouvelUtilisateur;

            // Enregistrer la liste mise à jour dans le fichier JSON
            file_put_contents("utilisateurs.json", json_encode($utilisateurs));

            // Rediriger vers la page de connexion
            header("Location: login3.php");
            exit;
        } else {
            echo "L'email est déjà utilisé.";
        }
    }

    function emailDejaUtilise($utilisateurs, $email)
    {
        foreach ($utilisateurs as $utilisateur) {
            if (isset($utilisateur["email"]) && $utilisateur["email"] === $email) {
                return true;
            }
        }
        return false;
    }

?>