<!DOCTYPE html>
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
        include('variables.php');
        include('header.php');

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Récupérer les données du formulaire
            $titre = $_POST["titre"];
            $citation = $_POST["citation"];
            $auteur = $_POST["auteur"];

            // Ajouter la nouvelle épingle à la liste des épingles
            $nouvelleEpingle = array(
                "titre" => $titre,
                "citation" => $citation,
                "auteur" => $auteur,
                "user" => "email3@example.com"  // Remplacez cela par la vraie adresse e-mail de l'utilisateur connecté
            );

            // Ajouter la nouvelle épingle à la liste des épingles
            array_push($citations, $nouvelleEpingle);

            // Mettre à jour variables.php
            file_put_contents('variables.php', '<?php $citations = ' . var_export($citations, true) . '; ?>');
    }
    ?>

    <main class="pin-submit">

        <form action="submit-pin.php" method="POST">
            <div class="mb-3">
                <label for="titre" class="titre">Titre :<span class="required">*</span></label>
                <input type="text" class="form-control" id="titre" name="titre">
            </div>
            <div class="mb-3">
                <label for="citation" class="citation">Citation :<span class="required">*</span></label>
                <textarea class="form-control" id="citation" name="citation" rows="2"></textarea>
            </div>
            <div class="mb-3">
                <label for="auteur" class="auteur">Auteur :<span class="required">*</span></label>
                <input type="auteur" class="form-control" id="auteur" name="auteur">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Créer la pin</button>

        </form>

    </main>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>