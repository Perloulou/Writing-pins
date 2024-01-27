<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Writ’Pins - Ajouter un commentaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/form.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome - pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>

    <?php
    // Inclure les éléments communs comme l'en-tête
    include('header.php');

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifier et récupérer les données du formulaire
        if (isset($_POST['contenu_commentaire']) && isset($_POST['epingle_id'])) {
            // Récupérer les données du formulaire
            $contenu_commentaire = $_POST['contenu_commentaire'];
            $epingle_id = $_POST['epingle_id'];

            // Simuler l'ajout du commentaire à l'épingle (vous devez implémenter votre propre logique ici)
            // Ici, vous pouvez ajouter le commentaire à votre base de données ou à votre système de stockage approprié

            // Redirection vers la page précédente après l'ajout du commentaire
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } else {
            echo "Une erreur s'est produite lors de la soumission du formulaire.";
        }
    }
    ?>

    <?php
        $epingle_id = isset($_GET['epingle_id']) ? $_GET['epingle_id'] : '';
    ?>
    <input type="hidden" name="epingle_id" value="<?php echo htmlspecialchars($epingle_id); ?>">


    <!-- Votre contenu pour ajouter un commentaire -->
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-5 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ajouter un commentaire</h5>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="mb-3">
                                    <label for="contenu_commentaire" class="form-label">Contenu du commentaire :</label>
                                    <textarea class="form-control" id="contenu_commentaire" name="contenu_commentaire"
                                        rows="3" placeholder="Ajouter un commentaire..." required></textarea>
                                </div>
                                <input type="hidden" name="epingle_id" value="<?php echo $epingle['id']; ?>">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    // Inclure le contenu du pied de page si nécessaire
    include('footer.php');
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>