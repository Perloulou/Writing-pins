<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Writ’Pins</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href=".css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <?php

        include('variables.php');
        include('header.php');

    ?>

    <main>
        <?php

        /*if (!isset($_POST['titre']) || !isset($_POST['citation']) || !isset($_POST['auteur']))
        {
            echo('Il faut un titre, une citation et un auteur pour soumettre le formulaire.');
            
            // Arrête l'exécution de PHP
            return;
        
        }*/

        
        // Vérification si les champs sont vides avant de traiter le formulaire
        if (empty($_POST['titre']) || empty($_POST['citation']) || empty($_POST['auteur'])) {
            echo('Il faut un titre, une citation et un auteur pour soumettre le formulaire.');
            
            // Arrête l'exécution de PHP
            return;
        }

        // Récupération des données du formulaire
        $titre = strip_tags($_POST['titre']);
        $citation = strip_tags($_POST['citation']);
        $auteur = strip_tags($_POST['auteur']);


            // Vérification de l'existence et de la validité des paramètres passés
        if (isset($_POST['titre']) && isset($_POST['citation']) && isset($_POST['auteur'])) {
            $titre = isset($_POST['titre']) ? strip_tags($_POST['titre']) : '';
            $citation = isset($_POST['citation']) ? strip_tags($_POST['citation']) : '';
            $auteur = isset($_POST['auteur']) ? strip_tags($_POST['auteur']) : '';

            // Vérification des longueurs des valeurs passées
            if (strlen($titre) <= 40 && strlen($citation) <= 200 && strlen($auteur) <= 40) {
                // Les paramètres sont valides, affichage du message de succès avec le récapitulatif de la carte créée
                echo '<div>';
                echo '<h3>Formulaire bien reçu !</h3>';
                echo '<h5 class="card-title">Récapitulatif de la pin</h5>';
                echo '<div class="card"> <div class="card-body">';
                echo  '<p><strong>Titre :</strong> '  . $titre . '</p>';
                echo '<p><strong>Citation :</strong> ' . $citation . '</p>';
                echo '<p><strong>Auteur :</strong> ' . $auteur . '</p>';
                echo '</div></div>';
                echo '</div>';

                // Lien pour revenir à la page my-pins.php
                echo '<a href="my-pins.php">Retour à la page My Pins</a>';
            } else {
                // Les paramètres ne sont pas valides, affichage du message d'erreur
                echo '<div>';
                echo '<h3>Erreur !</h3>';
                echo '<p>Les valeurs dépassent les limites autorisées.</p>';
                echo '</div>';
            }
        } else {
            // Paramètres manquants, affichage du message d'erreur
            echo '<div>';
            echo '<h3>Erreur !</h3>';
            echo '<p>Champs du formulaires manquants.</p>';
            echo '</div>';
        }

    ?>
    </main>

    <footer>
        <?php
            include('footer.php');
        ?>
    </footer>

</body>