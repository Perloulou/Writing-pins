<?php
// Lire le contenu du fichier utilisateurs.json
$utilisateursJson = file_get_contents('utilisateurs.json');

// Convertir le JSON en tableau associatif
$utilisateurs = json_decode($utilisateursJson, true);

// Remplacer cette ligne par votre logique pour récupérer l'utilisateur connecté
// Vous devrez adapter cette partie en fonction de votre système d'authentification
$emailUtilisateur = 'utilisateur@exemple.com';

// Définir le cookie avec les informations de l'utilisateur connecté
setcookie(
    'LOGGED_USER',               // Nom du cookie
    $emailUtilisateur,           // Valeur du cookie (email de l'utilisateur)
    [
        'expires' => time() + 365 * 24 * 3600,  // Durée de validité : 1 an
        'secure' => true,                        // Cookie accessible uniquement via HTTPS
        'httponly' => true,                      // Cookie accessible uniquement côté serveur
        'samesite' => 'Strict',                  // Politique SameSite strict
    ]
);

?>