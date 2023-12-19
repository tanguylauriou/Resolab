<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="1css/styles.css">
    <link rel="stylesheet" href="1css/header-footer.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@300&family=Open+Sans:wght@300;700&display=swap');
    </style>
    <title>Résolab</title>
</head>
<body>
    <script src="menu-toggle.js"></script>
    <script src="btn-langue.js"></script>
<main>
        <section id="presentation" style="display: flex; align-items: center;">
            <div style="flex: 1;">
                <h2>Le projet ResoLab</h2>
                <p class="text">Les études confirment que l’âge d'accès à un premier équipement numérique ne cesse de baisser. Parents et enseignants expriment un besoin de mieux accompagner les enfants et prévenir les comportements à risque en augmentant leurs compétences dans le cadre scolaire et familial. L’objectif de RESOLAB est de développer des ressources numériques adaptées aux enfants, aux enseignants et aux familles afin de développer les compétences numériques clés, conformément au programme européen DigComp.</p>
                <a href="projet.php">En savoir plus sur le projet</a>
            </div>
            <div style="flex: 1;">
                <img src="image-logoSite/resolab_mobile.png" alt="Image de la présentation">
            </div>
        </section>
        <br>
        <br>
        <br>
        <br>
        <hr>
        

        <section id="actualitées">
    <h2>Dernières actualités</h2>
    <section class="actualité-container">
        <?php
        require_once('connexion_Bdd.php');

        // Récupérez les trois dernières actualités
        $query = "SELECT * FROM actualites ORDER BY id DESC LIMIT 3";
        $result = $connexion->query($query);

        if ($result) {
            echo '<div class="actualité">';
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="actualite">';
                echo '<a href="' . $row['lien_article'] . '">';
                echo '<img src="' . $row['image_url'] . '" alt="' . $row['titre'] . '">';
                echo '</a>';
                echo '<h3>' . $row['titre'] . '</h3>';
                echo '</a>';
                echo '</div>';
            }
            echo '</div>';
        }
        ?>
    </div>
</section>
        <br>
        <br>
        <br>
        <br>
        <hr>
       

        <section id="partenaires">
            <h2>Nos Partenaires</h2>
            <div class="partenaire">
                <div class="partenaire-item">
                    <h3>antic Pays Basque (FR)</h3>
                    <p>Agence de développement des usages numériques responsables</p>
                    <a href="partenaire.php">
                        <p>voir le partenaire.</p>
                    </a>
                </div>
                <div class= "partenaire-item">
                    <h3>AdoEnia (FR)</h3>
                    <p>Service de prévention santé dédié aux adolescents du Centre Hospitalier de la côte Basque</p>
                    <a href="partenaire.php#AdoEnia">
                        <p>voir le partenaire.</p>
                    </a>
                </div>
                <div class="partenaire-item">
                    <h3>La Particule (BE)</h3>
                    <p>Service d’actions en milieu ouvert au bénéfice des jeunes de 0 à 22 ans installé à Hannut (Belgique)</p>
                    <a href="partenaire.php#La Particule">
                        <p>voir le partenaire.</p>
                    </a>
                </div>
                <div class="partenaire-item">
                    <h3>MES (LT)</h3>
                    <p>Centre jeunesse qui opère dans 7 espaces autour de Vilnius pour répondre aux besoins des enfants et des jeunes</p>
                    <a href="partenaire.php#MES">
                        <p>voir le partenaire.</p>
                    </a>
                </div>
                <div class="partenaire-item">
                    <h3>UPV-EHU (ES)</h3>
                    <p>Deux groupes de recherche universitaires de San Sebastián sur les questions d’éducation de qualité</p>
                    <a href="partenaire.php#univ pays basque">
                        <p>voir le partenaire.</p>
                    </a>
                </div>
            </div>
        </section>
        <br>
        <br>
        <br>
        <br>
        <hr>
        

        <section id="blog">
            <h2>Derniers articles du blog</h2>
            <section class="articles-container">
                <?php
                // Inclure le code de connexion à la base de données
                require_once('connexion_Bdd.php');

                // Requête pour obtenir les 6 derniers articles du blog triés par ID décroissant
                
                $query = "SELECT * FROM articles ORDER BY id DESC LIMIT 3"; // Récupère les 3 derniers articles
                $result = $connexion->query($query);
            
                if ($result->rowCount() > 0) {
                    echo '<div class="articles">'; // Commencez un conteneur pour les articles
                    while ($row = $result->fetch()) {
                        echo '<div class="article">';
                        echo '<h3>' . $row['titre'] . '</h3>'; // Affichez le titre de l'article
                        if ($row['media_type'] === 'photo') {
                            echo '<a href="article_complet.php?id='.$row['id'].'"><img src="' . $row['media_url'] . '" alt="' . $row['titre'] . '" class="carousel-image"></a>';
                        } elseif ($row['media_type'] === 'video') {
                            echo '<a href="article_complet.php?id=' . $row['id'] . '"><img src="image-logoSite/video.jfif" alt="' . $row['titre'] . '" class="carousel-video"></a>';


                        }
                        echo '</div>';
                    }
                    echo '</div>'; // Fermez le conteneur pour les articles
                } else {
                    echo "Aucun article trouvé.";
                }
            
                // Fermer la connexion à la base de données
                $connexion = null;
                ?>
            </section>
            <hr>
            
    </main>

    
    <?php include 'footer.php'; ?>
</body>
</html>
