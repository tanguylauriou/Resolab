<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../1css/style_livrable.css">
    <link rel="stylesheet" href="../1css/header-footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@300&family=Open+Sans:wght@300;700&display=swap" rel="stylesheet">
</head>
<body>
<script src="btn-langue.js"></script>
    <main>
        <div class="liste-livrables">
            <?php
            // Vérifiez si l'utilisateur est connecté
            if (isset($_SESSION['utilisateur_connecte'])) {
                // L'utilisateur est connecté, affichez le formulaire d'ajout de livrable
                echo '<h2>Ajouter un livrable</h2>';
                echo '<form action="traitement_livrable.php" method="post" enctype="multipart/form-data">';
                echo '<label for="nom">Nom du livrable :</label>';
                echo '<input type="text" id="nom" name="nom" required>';
                echo '<br>';
                echo '<label>Public cible :</label>';
                echo '<div class="checkbox-group" id="public_cible">';
                echo '    <label><input type="checkbox" name="public_cible[]" value="Enfants"> Enfants</label>';
                echo '    <label><input type="checkbox" name="public_cible[]" value="Enseignants"> Enseignants</label>';
                echo '    <label><input type="checkbox" name="public_cible[]" value="Parents"> Parents</label>';
                echo '</div>';
                echo '<br>';
                echo '<label for="type_document">Type de document :</label>';
                echo '<select id="type_document" name="type_document">';
                echo '    <option value="Guides">Guides</option>';
                echo '    <option value="Outils numériques">Outils numériques</option>';
                echo '    <option value="Diagnostics">Diagnostics</option>';
                echo '    <option value="Théâtre-forum">Théatre-forum</option>';
                echo '    <option value="Groupes de discussion">Groupes de discussion</option>';
                echo '    <option value="Formation">Formation</option>';
                echo '    <option value="Expérimentation">Expérimentation</option>';
                
                echo '</select>';
                echo '<br>';
                echo '<label for="fichier">Fichier du livrable :</label>';
                echo '<input type="file" id="fichier" name="fichier">';  
                echo '<br>';
                echo '<label for="description">description du livrable :</label>';
                echo '<input type="text" id="description" name="description" required>';
                echo '<br>';
                echo '<select id="langue" name="langue">
                <option value="fr">Français</option>
                <option value="en">Anglais</option>
                <option value="es">Espagnol</option>
                <option value="eu">Basque</option>
                <option value="lt">Lituanien</option>
                </select>';
                echo '<input type="submit" value="Ajouter le livrable">';
                echo '</form>';
            } else {
                echo '<h2>Erreur : Vous devez vous connecter pour accéder à cette page</h2>';
                exit(); // Assurez-vous de terminer le script après la redirection
            }
            ?>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
