<?php include 'header.php';
 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../1css/style_blog.css">
    <link rel="stylesheet" href="../1css/header-footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@300&family=Open+Sans:wght@300;700&display=swap" rel="stylesheet">
    <script src="menu-toggle.js"></script>
    <script src="btn-langue.js"></script>
    <script>
    // Fonction pour rediriger vers la page de modification avec l'ID de l'article
    function modifierArticle(articleId) {
        window.location.href = 'modifier_article.php?id=' + articleId;
    }
</script>
<script>
function supprimerArticle(articleId) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cet article ?")) {
        // Utilisez une requête AJAX pour envoyer l'ID de l'article au script de traitement
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "traitement_suppression_article.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Traitez la réponse, par exemple, actualisez la page
                if (xhr.responseText === "OK") {
                    window.location.reload();
                } else {
                    alert("Erreur lors de la suppression de l'article.");
                }
            }
        };
        xhr.send("article_id=" + articleId);
    }
}
</script>



<title>Résolab Europe - Blog</title>
</head>
<body>
    <main>
        <h2>Articles</h2>
        <?php
        if (isset($_SESSION['utilisateur_connecte'])) {
        echo ' <a href="ajouter_article.php" class="bouton-ajouter-article">Ajouter un article</a>';
        }
        ?>

        <!-- Liste d'articles du blog ici -->
        <div class="liste-articles">
            <?php
            // Connexion à la base de données
            require_once('connexion_Bdd.php');

            $query = "SELECT * FROM articles WHERE langue = 'fr' GROUP BY id DESC";
            $result = $connexion->query($query);
            if ($result) {
                $row_count = $result->rowCount();
            }

            if ($row_count > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="article">';
                    $titre = $row['titre'];
                    $contenu = $row['contenu'];

                    echo '<h3>' . $row['titre'] . '</h3>';


                    if ($row['media_type'] === 'photo') {
                        echo '<div class="image-container">';
                        echo '<img class="article-image" src="' . $row['media_url'] . '" alt="Image ' . $row['titre'] . '">';
                        echo '<br>';
                        echo '<h3><a class="lien-article" href="../article_complet.php?id=' . $row['id'] . '">En savoir plus</a></h3>';
                        echo '</div>';
                    } elseif ($row['media_type'] === 'video') {
                        echo '<div class="video-container">';
                        echo '<video controls poster="poster_image.jpg" width="300" height="200">'; // Spécifiez les dimensions que vous souhaitez
                        echo '<source src="' . $row['media_url'] . '" type="video/mp4">';
                        echo 'Votre navigateur ne supporte pas la lecture de la vidéo.';
                        echo '</video>';
                        echo '</div>';
                    }
                    
                     // Vérifiez si l'utilisateur est connecté
                     if (isset($_SESSION['utilisateur_connecte'])) {
                        // Si connecté, affichez les boutons de modification et de suppression
                        echo '<button onclick="modifierArticle(' . $row['id'] . ')">Modifier</button>';
                        echo '<button onclick="supprimerArticle(' . $row['id'] . ')">Supprimer</button>';

                    }

                    echo '</div>'; // Fermer la div article
                }
            } else {
                echo "Aucun article trouvé.";
            }
            // Fermer la connexion à la base de données
            $connexion = null;
            ?>
        </div>

   
    </main>
    <?php include 'footer.php'; ?>
    
</body>
</html>
