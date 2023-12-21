<?php
// Inclure le code de connexion à la base de données
require_once('connexion_Bdd.php');

// Ajout d'un livrable
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = $_POST['nom'];
    $public_cibles = implode(', ', $_POST['public_cible']); // Convertissez le tableau en une chaîne séparée par des virgules
    $file_name = $_FILES['fichier']['name'];
    $file_tmp = $_FILES['fichier']['tmp_name'];
    $type_document = $_POST['type_document'];
    $description = $_POST['description'];

    // Déplacez le fichier téléchargé vers un emplacement sur le serveur (par exemple, un dossier "livrables")
    $upload_dir = 'dossier-livrables/'; // Spécifiez le répertoire de destination
    $upload_path = $upload_dir . $file_name;
    if (move_uploaded_file($file_tmp, $upload_path)) {
        // Insérez un enregistrement dans la base de données avec la liste des publics cibles et le type de document
        $query = "INSERT INTO livrables (nom, public_cible, fichier, type_document, description) VALUES (:nom, :public_cibles, :fichier_url, :type_document, :description)";
        $stmt = $connexion->prepare($query);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':public_cibles', $public_cibles, PDO::PARAM_STR); // Utilisez la chaîne convertie
        $stmt->bindParam(':fichier_url', $upload_path, PDO::PARAM_STR);
        $stmt->bindParam(':type_document', $type_document, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);

        if ($stmt->execute()) {
            // Redirigez l'utilisateur après l'ajout
            header("Location: livrable.php");
        } else {
            echo "Erreur lors de l'ajout du livrable";
        }
    }
    
}


    // Fermez la connexion à la base de données
    $connexion = null;

?>
