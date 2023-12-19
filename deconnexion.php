<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['utilisateur_connecte'])) {
    // L'utilisateur est connecté, supprimer la variable de session
    unset($_SESSION['utilisateur_connecte']);
}

// Rediriger l'utilisateur vers la page d'accueil ou une autre page après la déconnexion
header("Location: index.php");
exit();
?>
