<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Writ’Pins</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="main.php">Writ’Pins</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="main.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="loginLink" href="login3.php">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="my-pins.php">Mes épingles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form-deconnexion.php">Deconnexion</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.navbar-toggler').on('click', function() {
            $(this).toggleClass('active');
            // If using Bootstrap 5.x
            $('.collapse').toggleClass('show');
        });
    });


    $.ajax({
        url: 'utilisateurs.json',
        dataType: 'json',
        success: function(utilisateurs) {
            /*console.log(utilisateurs);*/
            const isConnected = <?php echo isset($_SESSION['utilisateur']) ? 'true' : 'false'; ?>;

            // Vérifier si l'utilisateur est connecté
            if (isConnected) {
                // Récupérer les informations de l'utilisateur (ici, le premier utilisateur est utilisé à titre d'exemple)
                const connectedUtilisateurs = utilisateurs[0];

                // Mettre à jour la barre de menu avec le nom et la photo de profil de l'utilisateur
                $('#loginLink').html(
                    `<li class="nav-item"><a class="nav-link" href="#">${connectedUtilisateurs.prenom} <img src="chemin/vers/photo.jpg" style="width: 30px;  border-radius: 50%;"></a></li>`
                );
            } else {
                // Si l'utilisateur n'est pas connecté, afficher le lien "Se connecter"
                $('#loginLink').html(
                    '<li class="nav-item"><a class="nav-link" href="login3.php">Se connecter</a></li>');
            }
        },
        error: function(error) {
            console.error('Erreur lors de la récupération des utilisateurs :', error);
        }
    });
    </script>


</body>