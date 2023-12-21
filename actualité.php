<?php include 'header.php';
 ?>
 <?php
// Inclure le code de connexion à la base de données
require_once('connexion_Bdd.php');


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="1css/actualité.css">
    <link rel="stylesheet" href="1css/header-footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@300&family=Open+Sans:wght@300;700&display=swap" rel="stylesheet">
    <script src="menu-toggle.js"></script>
    <script src="btn-langue.js"></script>
    <title>Résolab - Actualité</title>
    </head>
<body>
    <main>
    <a href="ajouter_actualité.php" class="bouton-ajouter-actualité">Ajouter une actualité</a>
    <div class="actualite-container">
<?php

// Inclure le code de connexion à la base de données
require_once('connexion_Bdd.php');

// Récupérer les actualités depuis la base de données
$query = "SELECT * FROM actualites ORDER BY id DESC";
$result = $connexion->query($query);

if ($result) {
    $row_count = $result->rowCount();
}

if ($row_count > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        
        $titre = $row['titre'];
        $lien_article = $row['lien_article'];
        
        // Utilisez des div pour centrer le contenu
        echo '<div class="actualite-item">';
        
        echo '<h3><a class ="lien-actualite" href="' . $lien_article .  '" target="_blank">' . $titre . '</a></h3>';
        echo '<img class="actualite-image" src="' . $row['image_url'] . '" alt="' . $titre . '">';
        
        // Fermez la div actualite-container
        echo '</div>';
        echo '<br>';
        echo '<br>';
        echo '<hr>';
        
    }
    echo '</div>'; // Fermer la div actualite
}
?>
</div>
    <?php
    // Fermez la connexion à la base de données
    $connexion = null;
    ?>
    </main>
    <?php include 'footer.php'; ?>
    
</body>
</html>