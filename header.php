 <header>
 <style>
   
    </style>
 <div class="navbar">
    <div class="logo-left">
    <a href="index.php">
    <img src="image-logoSite/Logo_Resolab_blanc_fond_transp.png" alt="Accueil">
    </a>
    </div>
    <div class="logo-right">
    <img src="image-logoSite/FR_FundedbytheEU_RGB_WHITE Outline.png" alt="financé par l'europe">
                
    </div>
    <div class="menu-button">
        <button class="menu-button" id="menu-toggle">Menu</button>
        </div>
</div>
        <nav>
            <ul>
                <li>
                    <a href="index.php">
                        <img class=logo1 src="image-logoSite/Logo_Resolab_blanc_fond_transp.png" alt="Accueil" style="width: 40mm; height: auto; padding-right: 50px;float: left; padding-left: 50px">
                    </a>
                    <img class=logo2 src="image-logoSite/FR_FundedbytheEU_RGB_WHITE Outline.png" alt="financé par l'europe" style="width: 40mm; height: auto;float: left; padding-top: 30px">
                </li>
                <?php
                session_start();
                if (isset($_SESSION['utilisateur_connecte'])) {
                    // L'utilisateur est connecté, affichez le bouton de déconnexion
                    echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
                }
                ?>
                <li><a href="projet.php">Projet</a></li>
                <li><a href="actualité.php">Actualité</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="livrable.php">Livrables</a></li>
                <li><a href="partenaire.php">Partenaires</a></li>
                <li class="lang-dropdown">
    <a href="#" class="dropbtn" id="languageButton">
        <img src="drapeau-francais.png" alt="Français"> Français
    </a>
  <div class="dropdown-content" id="languageDropdown">
    <a href="#" data-lang="fr"><img src="image-logoSite/drapeau-francais.png" alt="Français" class="flag-img"> </a>
    <a href="#" data-lang="en"><img src="image-logoSite/drapeau-anglais.png" alt="Anglais" class="flag-img"> </a>
    <a href="#" data-lang="es"><img src="image-logoSite/drapeau-espagnol.png" alt= "Espagnol" class="flag-img"> </a>
    <a href="#" data-lang="lt"><img src="image-logoSite/drapeau-lituanien.png" alt="Lituanien" class="flag-img"> </a>
    <a href="#" data-lang="eu"><img src="image-logoSite/drapeau-basque.png" alt="Basque" class="flag-img"> </a>
</div>
</li>

                </li>
            </ul>
        </nav>
    </header>