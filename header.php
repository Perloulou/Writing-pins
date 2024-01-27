<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Writ’Pins</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Writ’Pins</a>
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
                        <a class="nav-link" href="login3.php">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./my-pins.php">Mes épingles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./php/form-deconnexion.php">Deconnexion</a>
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

    const isConnected = true; // Mettez à jour cette variable selon l'état de connexion de l'utilisateur

    $(document).ready(function() {
        if (isConnected) {
            // Si l'utilisateur est connecté, changez le lien "Se connecter" par le nom et la photo de profil
            $('#loginLink').html(
                `<a class="nav-link" href="#">Nom Utilisateur <img src="chemin/vers/photo.jpg" alt="Photo de profil" style="width: 30px; height: 30px; border-radius: 50%;"> </a>`
            );
        }
    });
    </script>


</body>