
<!DOCTYPE html>
<?php include 'header.php'; ?>
<html lang="fr">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="1css/header-footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@300&family=Open+Sans:wght@300;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/4fe7sm9ec2b752pkfn9gl3rzjkg7m7otrnp5frpsezwurdvj/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
    tinymce.init({
        selector: 'textarea',  // Sélectionnez les textarea que vous voulez transformer en éditeurs TinyMCE
        plugins: 'autolink lists link image charmap print preview',
        toolbar: 'bold italic | fontsizeselect | link image',
        fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
        
    });
</script>
</head>
<body>
<script src="menu-toggle.js"></script>
<script src="btn-langue.js"></script>
    <main>
        <?php
        // Vérifiez si l'utilisateur est connecté
        if (isset($_SESSION['utilisateur_connecte'])) {
            // L'utilisateur est connecté, affichez le formulaire d'ajout d'articles
            echo '<h2>Ajouter un article</h2>';
            echo '<form action="traitement_article.php" method="post" enctype="multipart/form-data">';
            echo '<label for="titre">Titre de l\'article :</label>';
            echo '<input type="text" id="titre" name="titre">';
            echo '<label for="contenu">Contenu de l\'article :</label>';
            echo '<textarea id="contenu" name="contenu" rows="4" style="width: 100%; height: 192px;"></textarea>';
            echo '<label for="media_url">Image/vidéo de l\'article :</label>';
            echo '<input type="file" id="media_url" name="media_url" accept="image/*" required>';
            echo '<input type="submit" value="Ajouter l\'article">';
            echo '</form>';
        } else {
            echo '<h2>Erreur : Vous devez vous connecter pour accéder à cette page</h2>';
            exit(); // Assurez-vous de terminer le script après la redirection
        }
        ?>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>
