<?php


// Inclure le code de connexion à la base de données
require_once('connexion_Bdd.php');

if (isset($_POST['article_id'])) {
    $article_id = $_POST['article_id'];


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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données du formulaire de modification
    $nouveau_titre = $_POST['nouveau_titre'];
    $nouveau_contenu = $_POST['nouveau_contenu'];
    $nouvelle_langue = $_POST['nouvelle_langue'];

    if (!empty($_FILES['nouvelle_image']['name'])) {
        // Si un nouveau fichier image a été téléchargé
        $file_name = $_FILES['nouvelle_image']['name'];
        $file_tmp = $_FILES['nouvelle_image']['tmp_name'];
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);

        //ICI VOUS POUVEZ METTRE DE NOUVELLES EXTENSIONS POUR LES IMAGES ET VIDEO
        if (in_array($extension, array("jpg", "jpeg", "png", "gif"))) {
            $media_type = 'photo';
        } elseif (in_array($extension, array("mp4", "avi", "mov"))) {
            $media_type = 'video';
        }

        // Déplacez le fichier téléchargé vers un emplacement sur le serveur
        $upload_dir = '../dossier-images/';
        $upload_path = $upload_dir . $file_name;

        if (move_uploaded_file($file_tmp, $upload_path)) {
            // Mettez à jour le chemin de l'image dans la base de données
            $query = "UPDATE articles SET titre = :nouveau_titre, contenu = :nouveau_contenu, media_url = :media_url, media_type = :media_type, langue = :nouvelle_langue WHERE id = :article_id";
            $stmt = $connexion->prepare($query);
            $stmt->bindParam(':nouveau_titre', $nouveau_titre, PDO::PARAM_STR);
            $stmt->bindParam(':nouveau_contenu', $nouveau_contenu, PDO::PARAM_STR);
            $stmt->bindParam(':media_url', $upload_path, PDO::PARAM_STR);
            $stmt->bindParam(':media_type', $media_type, PDO::PARAM_STR);
            $stmt->bindParam(':nouvelle_langue', $nouvelle_langue, PDO::PARAM_INT);
            $stmt->bindParam(':article_id', $article_id, PDO::PARAM_INT);
            

            if ($stmt->execute()) {
                header("Location: ../fr/blog.php");
            } else {
                echo "Erreur lors de la mise à jour de l'article.";
            }
        } else {
            echo "Erreur lors de l'envoi du fichier.";
        }
    } else {
        // Si aucun nouveau fichier image a été téléchargé, mettez à jour uniquement le titre le contenu et la langue
        $query = "UPDATE articles SET titre = :nouveau_titre, contenu = :nouveau_contenu, langue = :nouvelle_langue WHERE id = :article_id";
        $stmt = $connexion->prepare($query);
        $stmt->bindParam(':nouveau_titre', $nouveau_titre, PDO::PARAM_STR);
        $stmt->bindParam(':nouveau_contenu', $nouveau_contenu, PDO::PARAM_STR);
        $stmt->bindParam(':nouvelle_langue', $nouvelle_langue, PDO::PARAM_INT);
        $stmt->bindParam(':article_id', $article_id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            header("Location: blog.php");
        } else {
            echo "Erreur lors de la mise à jour de l'article.";
        }
    }
}


?>
