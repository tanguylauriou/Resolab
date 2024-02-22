
<!DOCTYPE html>
<?php include 'header.php'; ?>
<html lang="fr">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../1css/header-footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@300&family=Open+Sans:wght@300;700&display=swap" rel="stylesheet">
    </head>
<body>
<script src="menu-toggle.js"></script>
<script src="btn-langue.js"></script>
    <main>
        <?php
        // Vérifiez si l'utilisateur est connecté
       /* if (isset($_SESSION['utilisateur_connecte'])) {*/
            echo '<form action="traitement_actualite.php" method="post" enctype="multipart/form-data">';
            echo '    <label for="titre">Titre :</label>';
            echo '    <input type="text" id="titre" name="titre" required>';
            echo '    <label for="image_url">URL de l\'image :</label>';
            echo '<input type="file" id="image_url" name="image_url" accept="image/*" required>';
            echo '    <label for="lien_article">Lien de l\'actualité :</label>';
            echo '    <input type="text" id="lien_article" name="lien_article" required>';
            echo '<select id="langue" name="langue">
            <option value="fr">Français</option>
            <option value="en">Anglais</option>
            <option value="es">Espagnol</option>
            <option value="eu">Basque</option>
            <option value="lt">Lituanien</option>
            </select>';
            echo '<input type="submit" value="Ajouter l\'actualitée">';
            echo '</form>';
            

       /* } else {
            echo '<h2>Erreur : Vous devez vous connecter pour accéder à cette page</h2>';
            exit(); // Assurez-vous de terminer le script après la redirection
        }*/
        ?>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>