<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="1css/styles_livrable.css">
    <link rel="stylesheet" href="1css/header-footer.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@300&family=Open+Sans:wght@300;700&display=swap');
    </style>
    <script src="menu-toggle.js"></script>
    <script src="filtre-livrable.js"></script>
    <script src="btn-langue.js"></script>
    <title>Résolab - Livrables</title>

</head>
<body>
    <main>
        <h2>livrables</h2>
    <a href="ajouter_livrable.php" class="bouton-ajouter-livrable">Ajouter un livrable</a>
    <div class="filter-buttons-public">
    <button class="filter-button-pub" data-filter="tous">Tous</button>
    <button class="filter-button-pub" data-filter="Enfants">Enfants</button>
    <button class="filter-button-pub" data-filter="Enseignants">Enseignants</button>
    <button class="filter-button-pub" data-filter="Parents">Parents</button>
</div>
<br>
<div class="filter-buttons">
    <button class="filter-button" data-filter="tous">Tous</button>
    <button class="filter-button" data-filter="Guides">Guides</button>
    <button class="filter-button" data-filter="Outils numériques">Outils numériques</button>
    <button class="filter-button" data-filter="Diagnostics">Diagnostics</button>
    <button class="filter-button" data-filter="Théâtre-forum">Théâtre-forum</button>
    <button class="filter-button" data-filter="Groupes de discussion">Groupes de discussion</button>
    <button class="filter-button" data-filter="Formation">Formation</button>
    <button class="filter-button" data-filter="Expérimentation">Expérimentation</button>
</div>




<div class="liste-livrable">
    <?php
    require_once('connexion_Bdd.php');
    $query = "SELECT * FROM livrables ORDER BY id DESC";
    $result = $connexion->query($query);

    if ($result) {
        $row_count = $result->rowCount();
    }

    if ($row_count > 0) {
        echo '<div class="livrables-container">'; // Ajoutez un conteneur pour les livrables

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="livrable">';
            echo '<h3>' . $row['nom'] . '</h3>';
            echo '<p>' .$row['description'].'</p>';
           
           
            echo '<span class="public-cible">#' . $row['public_cible'] . '</span>';
            echo '<p class="type-document">#' . $row['type_document'] . '</p>';
            echo '<br>';
          
          

            echo '<a href="' . $row['fichier'] . '" download="' . $row['fichier'] . '">Télécharger</a>';
            echo '</div>';
        }

        echo '</div>'; // Fermez le conteneur des livrables
    }
    $connexion = null;
    ?>
    </div>
    
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>