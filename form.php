<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Writ’Pins</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <form action="submit-pin.php" method="POST">
        <div class="mb-3">
            <label for="titre" class="titre">Titre :</label>
            <input type="text" class="form-control" id="titre" name="titre">
        </div>
        <div class="mb-3">
            <label for="citation" class="citation">Citation :</label>
            <textarea class="form-control" id="citation" name="citation" rows="2"></textarea>
        </div>
        <div class="mb-3">
            <label for="auteur" class="auteur">Auteur :</label>
            <input type="auteur" class="form-control" id="auteur" name="auteur">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Créer la pin</button>

    </form>
</body>