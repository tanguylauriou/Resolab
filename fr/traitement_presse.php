<?php
// Inclure le code de connexion à la base de données
require_once('connexion_Bdd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $langue = $_POST['langue'];
    $file_name = $_FILES['media_url']['name'];
    $file_tmp = $_FILES['media_url']['tmp_name'];
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);

    if (in_array($extension, array("jpg", "jpeg", "png", "gif", "PNG"))) {
        $media_type = 'photo';
    } elseif (in_array($extension, array("mp4", "avi", "mov"))) {
        $media_type = 'video';
    }

    // Déplacez le fichier téléchargé vers un emplacement sur le serveur (par exemple, un dossier "media")
    $upload_dir = '../dossier-images/'; // Spécifiez le répertoire de destination
    $upload_path = $upload_dir . $file_name;
    if (move_uploaded_file($file_tmp, $upload_path)) {
    $query = "INSERT INTO articles_de_presse (titre, contenu, media_url, media_type, languy) VALUES (:titre, :contenu, :media_url, :media_type, :langue)";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
    $stmt->bindParam(':contenu', $contenu, PDO::PARAM_STR);
    $stmt->bindParam(':media_url', $upload_path, PDO::PARAM_STR);
    $stmt->bindParam(':media_type', $media_type, PDO::PARAM_STR);
    $stmt->bindParam(':langue', $langue, PDO::PARAM_STR);

    if ($stmt->execute()) {
        header("Location: presse.php");
    } else {
        echo "Erreur lors de l'ajout de l'article dans la base de données.";
    }
}
    // Fermez la connexion à la base de données
    $connexion = null;
} else {
    echo "Erreur lors de l'envoi du fichier.";
}

if (isset($_POST['supprimer_article'])) {
    $article_presse__id = $_POST['article_presse_id']; // Récupérez l'ID de l'article à supprimer

    // Réalisez la suppression de l'article dans la base de données en utilisant l'ID
    $query = "DELETE FROM articles_de_presse WHERE id = :article_presse_id";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':article_presse_id', $article_presse_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: blog.php");
    } else {
        echo "Erreur lors de la suppression de l'article.";
    }
}

?>