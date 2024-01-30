<?php
session_start();
$moi = "";
// Vérifiez si l'utilisateur est connecté
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Vérifiez si l'email de l'utilisateur existe dans le tableau $users
    if (array_key_exists($email, $users)) {
        $moi = "(moi)";
    } else {
        $moi = "Utilisateur inconnu";
    }
} 
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Writ’Pins</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <?php
        include('cookies.php');
        include('variables.php');
        include('header.php');
    ?>
    <main>
        <div class="container">
            <div class="row">
                <!-- Récupération de l'email de l'utilisateur pour chaque citation -->
                <?php foreach ($citations as $citation) {
                $email = $citation['user'];

                // Vérification si l'email de l'utilisateur existe dans le tableau $users
                if (array_key_exists($email, $users)) {
                } else {
                $Prenom = "Utilisateur inconnu";
                }

                ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $citation['titre']; ?></h5>
                            <p class="card-text"><?php echo $citation['citation']; ?></p>
                            <p class="card-text">Auteur : <?php echo $citation['auteur']; ?>
                            <p class="card-text">Posté par : <?php  echo  $users[$citation['user']], "<br>";?>
                                <?php echo $moi; ?>

                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>


    </main>

    <?php 
    // Inclusion du fichier footer.php pour le contenu du pied de page    
    include('footer.php');
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Autres scripts JavaScript -->
</body>

</html>