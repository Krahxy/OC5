<div id="navigationTop">

    <nav class="connectBar">
        <ul>
        <li><a class="burgerButton" href="#"><i class="fas fa-bars"></i></a></li>
        <?php
            if (isset($_SESSION['status'])) { if ($_SESSION['status'] == 1) { echo '<li class="adminLi"><a href="index.php?action=admin"><i class="fas fa-user-tie"></i>Administration</a></li>';}}?>
            <?php echo isset($_SESSION['pseudo']) ? '<li><a href="index.php?action=profil"><i class="fas fa-user"></i>Mon compte</a></li>' : '' ?>
            <?php echo isset($_SESSION['pseudo']) ? '<li><a href="index.php?action=deconnexion"><i class="fas fa-key"></i>Déconnexion</a></li>' : '<li><a href="index.php?action=connexion"><i class="fas fa-key"></i>Connexion</a></li>' ?>
            <?php echo isset($_SESSION['pseudo']) ? '' : '<li><a href="index.php?action=inscription"><i class="fas fa-plus-square"></i>Créer un compte</a></li>' ?>
        </ul>
    </nav>

    <div class="burger">
                <ul>
                    <li><a class="burgerButton" href="#"><i class="fas fa-times"></i></a></li>
                    <li><a href="index.php?action=home">ACCUEIL</a></li>
                    <li><a href="index.php?action=actualites">ACTUALITÉS</a></li>
                    <li><a href="index.php?action=ville">VILLE</a>
                    <li><a href="index.php?action=tourisme">TOURISME</a></li>
                    <li><a href="index.php?action=meteo">METEO</a></li>
                    <li><a href="index.php?action=faq">FAQ</a>
                    <li><a href="index.php?action=contact">CONTACT</a></li>
<?php               if (isset($_SESSION['status'])) { if ($_SESSION['status'] == 1) { echo '<li><a href="index.php?action=admin"><i class="fas fa-user-tie"></i>ADMINISTRATION</a></li>';}}?>
                </ul>
            </div>

    <nav class="navbar">
        <a id="navLogo" href="index.php?action=home"><img src="./public/images/LP_logo.png" alt="logo du site" class="img-fluid" /></a>
        <ul>
            <li><a class="navbar-brand" href="index.php?action=home"><i class="fas fa-home"></i>ACCUEIL</a></li>
            <li><a class="navbar-brand" href="index.php?action=actualites">ACTUALITÉS</a></li>
            <li><a class="navbar-brand" href="index.php?action=ville">VILLE</a>
            <li><a class="navbar-brand" href="index.php?action=tourisme">TOURISME</a></li>
            <li><a class="mainBurgerBtn navbar-brand" href="#"><i class="fas fa-bars"></i></a></li>
        </ul> 
    </nav>

    <div id="expandedMenu" class="navbar-brand">
        <div class="expandedMenuSection">
            <h3>Ville</h3>
            <ul>
                <li><a href="index.php?action=histoire">Histoire</a></li>
                <li><a href="index.php?action=ville">Enfance</a></li>
                <li><a href="index.php?action=commercants">Commerçants</a></li>
                <li><a href="index.php?action=associations">Associations</a></li>
            </ul>   
        </div>

        <div class="expandedMenuSection">
            <h3>Tourisme</h3>
            <ul>
                <li><a href="index.php?action=parcmelaga">Parc Mélaga</a></li>
                <li><a href="index.php?action=hotels">Nos Hôtels</a></li>
            </ul>   
        </div>

        <div class="expandedMenuSection">
            <h3>Plus d'infos</h3>
            <ul>
                <li><a href="index.php?action=meteo">Météo</a></li>
                <li><a href="index.php?action=contact">Contact</a></li>
                <li><a href="index.php?action=faq">FAQ</a></li>
            </ul>   
        </div>

    </div>
</div>