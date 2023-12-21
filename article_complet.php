<?php include 'header.php'; ?>
<?php

// Inclure le code de connexion à la base de données
require_once('connexion_Bdd.php');

// Récupérez l'identifiant de l'article depuis les paramètres GET
$articleId = $_GET['id']; // Assurez-vous de bien valider et nettoyer cette valeur.

// Exemple de requête SQL pour récupérer les détails de l'article
$query = "SELECT titre, contenu, media_url FROM articles WHERE id = :articleId";
$stmt = $connexion->prepare($query);
$stmt->bindParam(':articleId', $articleId, PDO::PARAM_INT);
$stmt->execute();
$articleDetails = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="1css/header-footer.css">
    <link rel="stylesheet" href="1css/style_article_complet.css">

    <!-- Ajoutez d'autres éléments d'en-tête si nécessaire -->
</head>
<body>
    <script src="menu-toggle.js"></script>
    <script src="btn-langue.js"></script>

    <main>
        <div class="article-complet">
            <h2><?php echo $articleDetails['titre']; ?></h2>
            
            <?php
            $media_url = $articleDetails['media_url'];
            $media_type = pathinfo($media_url, PATHINFO_EXTENSION);

            if (in_array($media_type, array("jpg", "jpeg", "png", "gif"))) {
                // Si c'est une image
                echo '<img src="' . $media_url . '" alt="' . $articleDetails['titre'] . '">';
            } elseif (in_array($media_type, array("mp4", "avi", "mov"))) {
                // Si c'est une vidéo
                echo '<video controls poster="poster_image.jpg" style="max-width: 100%;">';
                echo '<source src="' . $media_url . '" type="video/mp4">';
                echo 'Votre navigateur ne supporte pas la lecture de la vidéo.';
                echo '</video>';
            }
            ?>
            
            <p><?php echo $articleDetails['contenu']; ?></p>
        </div>
    </main>    
</body>
<?php include 'footer.php'; ?>
</html>