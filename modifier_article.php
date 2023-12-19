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
<script src="menu-toggle.js"></script>
<script src="btn-langue.js"></script>
</head>
<?php
// Inclure le code de connexion à la base de données
require_once('connexion_Bdd.php');

if (isset($_GET['id'])) {
    $article_id = $_GET['id'];

    // Sélectionnez l'article à partir de la base de données
    $query = "SELECT * FROM articles WHERE id = :article_id";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':article_id', $article_id, PDO::PARAM_INT);
    $stmt->execute();
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        echo "Article non trouvé.";
        exit();
    }
}
?>
<body>
    <main>
    <h2>Modifier l'article</h2>
    <form action="traitement_modification_article.php" method="post" enctype="multipart/form-data">
    <label for="nouveau_titre">Nouveau titre :</label>
    <input type="text" id="nouveau_titre" name="nouveau_titre" value="<?php echo $article['titre']; ?>">
    <label for="nouvelle_image">Nouvelle image :</label>
    <input type="file" id="nouvelle_image" name="nouvelle_image" accept="image/*">
    <label for="nouveau_contenu">Nouveau contenu :</label>
    <textarea id="nouveau_contenu" name="nouveau_contenu" rows="4" style="width: 100%; height: 192px"><?php echo $article['contenu']; ?></textarea>
    <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
    <input type="submit" value="Modifier l'article">
</form>


    </main>
</body>
</html>
