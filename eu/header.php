 <header>
<head>
<link rel="icon" href="favicon.ico" type="image/x-icon">

</head>
 <div class="navbar">
    <div class="logo-left">
    <a href="../eu/indexEU.php">
    <img src="../image-logoSite/Logo_Resolab_blanc_fond_transp.png" alt="Accueil">
    </a>
    </div>
    <div class="logo-right">
    <img src="../image-logoSite/FR_FundedbytheEU_RGB_WHITE Outline.png" alt="financé par l'europe">
                
    </div>
    <div class="menu-button">
        <button class="menu-button" id="menu-toggle">Menu</button>
        </div>
</div>
        <nav>
            <ul>
                <li>
                    <a href="../eu/indexEU.php">
                        <img class=logo1 src="../image-logoSite/Logo_Resolab_blanc_fond_transp.png" alt="Accueil" style="width: 40mm; height: auto; padding-right: 50px;float: left; padding-left: 50px">
                    </a>
                    <img class=logo2 src="../image-logoSite/FR_FundedbytheEU_RGB_WHITE Outline.png" alt="financé par l'europe" style="width: 40mm; height: auto;float: left; padding-top: 30px">
                </li>
                <?php
                session_start();
                if (isset($_SESSION['utilisateur_connecte'])) {
                    // L'utilisateur est connecté, affichez le bouton de déconnexion
                    echo '<li><a class="head" href="../fr/deconnexion.php">Déconnexion</a></li>';
                }
                ?>
                <li><a class="head" href="../eu/projet.php" aria-label="En savoir plus sur le projet ResoLab">Projet</a></li>
                <li><a class="head" href="../eu/actualite.php" aria-label="Les actualitées de resolab">Actualité</a></li>
                <li><a class="head" href="../eu/blog.php" aria-label="les dernier post de resolab">Blog</a></li>
                <li><a class="head" href="../eu/livrable.php" aria-label="les livrables du projet ResoLab">Livrables</a></li>
                <li><a class="head" href="../eu/partenaire.php" aria-label="les partenaires du projet ResoLab">Partenaires</a></li>
                <li class="lang-dropdown">
    <a class="dropbtn" id="languageButton">
        <img src="../image-logoSite/drapeau-basque.png" alt="basque" class="flag-img">
    </a>
  <div class="dropdown-content" id="languageDropdown">
    <a href="../index.php" data-lang="fr"><img src="../image-logoSite/drapeau-francais.png" alt="Français" class="flag-img" aria-label="Francais"> </a>
    <a href="../en/indexEN.php" data-lang="en"><img src="../image-logoSite/drapeau-anglais.png" alt="Anglais" class="flag-img" aria-label="English"> </a>
    <a href="../es/indexES.php" data-lang="es"><img src="../image-logoSite/drapeau-espagnol.png" alt= "Espagnol" class="flag-img" aria-label="españa"> </a>
    <a href="../lt/indexLT.php" data-lang="lt"><img src="../image-logoSite/drapeau-lituanien.png" alt="Lituanien" class="flag-img" aria-label="mettre lituanien en lituanien"> </a>
    <a href="../eu/indexEU.php" data-lang="eu"><img src="../image-logoSite/drapeau-basque.png" alt="Basque" class="flag-img" aria-label="mettre basque en basque"> </a>
</div>
</li>

                </li>
            </ul>
        </nav>
    </header>