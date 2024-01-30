<?php
session_start();
// Vérifier si l'utilisateur est connecté
$isConnected = isset($_SESSION['isConnected']) && $_SESSION['isConnected'];

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

        // Mettez à jour la variable isConnected dans la session
        $_SESSION['isConnected'] = true;
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/form.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h2>Connexion</h2>
    <form method="post" action="login_process.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" required>
        <br>
        <input type="submit" name="Connexion" class="btn-login" value="Se connecter">
    </form>
    <p>Pas encore inscrit? <a href="register.php">Inscrivez-vous ici</a></p>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        const isConnected = <?php echo $isConnected ? 'true' : 'false'; ?>;

        // Vérifier si l'utilisateur est connecté
        if (isConnected) {
            // Mettez à jour la barre de menu avec le nom et la photo de profil de l'utilisateur
            $('#loginLink').html(
                `<li class="nav-item"><a class="nav-link" href="#">Nom Utilisateur <img src="chemin/vers/photo.jpg" style="width: 30px;  border-radius: 50%;"></a></li>`
            );
            include('cookies.php');
        } else {
            // Si l'utilisateur n'est pas connecté, afficher le lien "Se connecter"
            $('#loginLink').html(
                '<li class="nav-item"><a class="nav-link" href="login3.php">Se connecter</a></li>');
        }
    });
    </script>

    <?php 
    // Inclusion du fichier footer.php pour le contenu du pied de page    
    include('footer.php');
    ?>
</body>

</html>