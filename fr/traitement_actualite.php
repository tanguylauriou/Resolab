<?php
// Inclure le code de connexion à la base de données
require_once('connexion_Bdd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $lien_article = $_POST['lien_article'];
    $file_name = $_FILES['image_url']['name'];
    $file_tmp = $_FILES['image_url']['tmp_name'];
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $langue = $_POST['langue'];


    // Déplacez le fichier téléchargé vers un emplacement sur le serveur (par exemple, un dossier "images")
    $upload_dir = '../dossier-images/'; // Spécifiez le répertoire de destination
    $upload_path = $upload_dir . $file_name;
    if (move_uploaded_file($file_tmp, $upload_path)) {
        $query = "INSERT INTO actualites (titre, lien_article, image_url, langue) VALUES (:titre, :lien_article, :image_url, :langue)";
        $stmt = $connexion->prepare($query);
        $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
        $stmt->bindParam(':lien_article', $lien_article, PDO::PARAM_STR);
        $stmt->bindParam(':image_url', $upload_path, PDO::PARAM_STR);
        $stmt->bindParam(':langue', $langue, PDO::PARAM_STR);

        if ($stmt->execute()) {
            header("Location: actualite.php");
        } else {
            echo "Erreur lors de l'ajout de l'actualité dans la base de données.";
        }
    }
    // Fermez la connexion à la base de données
    $connexion = null;
} else {
    echo "Erreur lors de l'envoi de l'image.";
}

?>