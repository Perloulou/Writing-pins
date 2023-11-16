<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Writ’Pins</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <?php
        include('variables.php');
        include('header.php');

        /* Boucle pour afficher les citations avec les prénoms des utilisateurs
        foreach ($citations as $citation) {
            $userEmail = $citation['user'];

            // Vérification si l'email de l'utilisateur existe dans le tableau $users
            if (array_key_exists($userEmail, $users)) {
                $userPrenom = $users[$userEmail];
                echo '<div>';
                echo '<h3>' . $citation['titre'] . '</h3>';
                echo '<p>' . $citation['citation'] . '</p>';
                echo '<p>Par ' . $citation['auteur'] . ', ajoutée par ' . $userPrenom . '</p>';
                echo '</div>';
            } else {
                echo '<p>Utilisateur inconnu pour la citation.</p>';
            }
        }*/
    ?>

    <main>
        <div class="container">
            <div class="row">
                <?php foreach ($citations as $citation) {
                $userEmail = $citation['user'];

                // Vérification si l'email de l'utilisateur existe dans le tableau $users
                if (array_key_exists($userEmail, $users)) {
                    $userPrenom = $users[$userEmail];
                } else {
                    $userPrenom = "Utilisateur inconnu";
                }
    
            ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $citation['titre']; ?></h5>
                            <p class="card-text"><?php echo $citation['citation']; ?></p>
                            <p class="card-text">Par <?php echo $citation['auteur']; ?>, ajoutée par
                                <?php echo $userPrenom; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>


        <?php
            include('form.php');
        ?>

    </main>

    <?php 
    
    include('footer.php');
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Autres scripts JavaScript -->
</body>

</html>