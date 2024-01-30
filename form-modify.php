<?php
session_start();
?>
<?php /*

session_start();



$query = "UPDATE `client` SET `mdp` = ? WHERE `login` = ? ;";

$change = $conn->prepare($query);

if ($_POST['new_mdp'] == $_POST['new_mdp1']) {

    $change->execute([$_POST['new_mdp'], $_SESSION['login']]);

    $conn->query('KILL CONNECTION_ID()');

    header("location: ../modify.html?reg_err=success");
} else
    header("location: ../modify.html?reg_err=error");

 */?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modification du mot de passe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include('header.php');

    session_start();

    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['email'])) {
        header('Location: login.php');
        exit;
    }
    ?>

    <main>
        <h2>Modification du mot de passe</h2>
        <form id="modifyPassword" method="POST" action="modify_password_process.php">
            <fieldset>
                <p>
                    <label for="oldPassword">Ancien mot de passe <span class="required">*</span></label><br>
                    <input id="oldPassword" type="password" name="oldPassword" required />
                </p>
                <p>
                    <label for="newPassword">Nouveau mot de passe <span class="required">*</span></label><br>
                    <input id="newPassword" type="password" name="newPassword" required />
                </p>
                <input type="submit" class="btn-connexion" name="ModifyPassword">
            </fieldset>
        </form>
    </main>

    <footer>
        <?php include('footer.php'); ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>