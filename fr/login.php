<?php
// Inclure le code de connexion à la base de données en utilisant PDO
require_once('connexion_Bdd.php');

session_start();
// Récupérer les données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Préparation de la requête avec des paramètres nommés
$query = "SELECT * FROM utilisateurs WHERE nom_utilisateur = :username AND mot_de_passe = :password";
$stmt = $connexion->prepare($query);

// Liaison des paramètres
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':password', $password, PDO::PARAM_STR);

// Exécution de la requête préparée
$stmt->execute();

// Vérification du résultat
if ($stmt->rowCount() > 0) {
    // L'utilisateur est authentifié avec succès
    // Après une authentification réussie
    $_SESSION['utilisateur_connecte'] = true;
    header("Location: ../fr/indexFR.php");
} else {
    // L'authentification a échoué
    echo "Nom d'utilisateur ou mot de passe incorrect.";
}


// $connexion = null; 

?>
