<?php
session_start();
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mes pins</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome - pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>

    <?php
    include('cookies.php');

        include('form.php'); 
    ?>

    <main>
        <div class="container">
            <div class="row">
                <?php
                // Vérifie si l'utilisateur a des épingles postées
                $epinglesUtilisateur = []; // Simule la récupération des épingles de l'utilisateur (vous devez remplacer ceci par votre propre logique de récupération des épingles)

                if (!empty($epinglesUtilisateur)) {
                    // Si l'utilisateur a des épingles, afficher chaque épingles
                    foreach ($epinglesUtilisateur as $epingle) {
                        ?>
                <!-- Structure HTML pour afficher chaque épingles -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- Afficher les détails de l'épingle -->

                            <h5 class="card-title"><?php echo $citation['titre']; ?></h5>
                            <p class="card-text"><?php echo $citation['citation']; ?></p>
                            <p class="card-text">Auteur : <?php echo $citation['auteur']; ?>
                            <p class="card-text">Posté par : <?php echo  $Prenom?>
                                <!-- Icône de poubelle pour supprimer l'épingle -->
                                <a href="supprimer_epingle.php?id=<?php echo $epingle['id']; ?>" class="text-danger">
                                    <i class="fas fa-trash-alt"></i> Supprimer cette épingle
                                </a>
                                <!-- Section des commentaires -->
                                <hr>
                        </div>
                        <h6>Commentaires :</h6>
                        <?php

                                    foreach ($commentaires as $commentaire) { ?>
                        <p><strong><?php echo $commentaire['utilisateur']; ?>:</strong>
                            <?php echo $commentaire['contenu']; ?></p>
                        <?php } ?>
                        <!-- Formulaire pour ajouter un commentaire -->
                        <?php
                                    // Vérification de l'état de connexion pour afficher le formulaire
                        $utilisateurConnecte = true; // Simuler un utilisateur connecté (vous devez adapter cela à votre système d'authentification)
                        ?>
                        <hr>

                        <h6>Ajouter un commentaire :</h6>

                        <?php if ($utilisateurConnecte) { ?>
                        <form action="ajouter_commentaire.php" method="POST">
                            <textarea name="contenu_commentaire" rows="3" placeholder="Ajouter un commentaire..."
                                required></textarea>
                            <br>
                            <button type="submit">Ajouter</button>
                            <input type="hidden" name="epingle_id" value="<?php echo $epingle['id']; ?>">
                        </form>
                        <?php } else { ?>
                        <p>Connectez-vous pour ajouter un commentaire.</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
                    }
                } else {
                    // Si l'utilisateur n'a pas d'épingles, afficher un message
                    ?>
            <div class="col-12 text-center">
                <p>Vous n'avez pas encore posté d'épingle.</p>
            </div>
            <?php
                }
                ?>
        </div>
        </div>
    </main>

    <?php
    // Inclure le contenu du pied de page
    include('footer.php');
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>