<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['article_id'])) {
        $article_id = $_POST['article_id'];

        // Inclure le code de connexion à la base de données
        require_once('connexion_Bdd.php');

        // Supprimez l'article de la base de données
        $query = "DELETE FROM articles WHERE id = :article_id";
        $stmt = $connexion->prepare($query);
        $stmt->bindParam(':article_id', $article_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "OK"; // Envoyez une réponse indiquant que la suppression a réussi
        } else {
            echo "Erreur lors de la suppression de l'article.";
        }

        // Fermez la connexion à la base de données
        $connexion = null;
    } else {
        echo "ID d'article manquant.";
    }
}
?>
