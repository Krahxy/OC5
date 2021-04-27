<?php include('_header.php');?>

    <body>
    <?php include('_navbar.php')?>

    <section class="bienvenue">
        <img src="./public/images/galameblack.jpg" alt="Photo du Parc Galamé" class="fond" />
        <div class="centerObject">
            <h2>Nool</h2>
            <p>Le site officiel de la mairie de la ville.</p>
            <div id="boutons">
                <a class="btn btn-primary" href="#details">Découvrir</a>
            </div>
        </div>
    </section>

    <section id="details">
        <div class="bloc">
            <a href="index.php?action=ville"><img src="./public/images/logos/ville.png" alt="Logo de Maison"/></a>
            <h2>Ville</h2>
            <p>La commune de Nool reste à votre écoute pour vous aidez au maximum.</p>
        </div>

        <div class="bloc">
            <a href="#"><img src="./public/images/logos/medical.png" alt="Logo de médical"/></a>
            <h2>Médical</h2>
            <p>Notre ensemble médicale sera toujours disponible pour vous garder au meilleur de votre forme.</p>
        </div>

        <div class="bloc">
            <a href="index.php?action=commercants"><img src="./public/images/logos/commercants.png" alt="Logo de commerçants"/></a>
            <h2>Commerçants</h2>
            <p>Retrouvez toutes nos boutiques et la liste complète des commerçants de la ville.</p>
        </div>

        <div class="bloc">
            <a href="index.php?action=associations"><img src="./public/images/logos/associations.png" alt="Logo de personnage"/></a>
            <h2>Associations</h2>
            <p>Nous avons également beaucoup d'associations au coeur de Nool. Venez les découvrir.</p>
        </div>

        <div class="bloc">
            <a href="index.php?action=ville"><img src="./public/images/logos/enfants.png" alt="Logo d'enfants"/></a>
            <h2>Enfants</h2>
            <p>Découvrez notre cantine, nos établissements scolaires et tout notre espace dédié à la jeunesse.</p>
        </div>

        <div class="bloc">
            <a href="index.php?action=tourisme"><img src="./public/images/logos/tourisme.png" alt="Logo d'arbres'"/></a>
            <h2>Tourisme</h2>
            <p>Installez-vous dans l'un de nos trois hôtels afin de visiter notre Parc Galamé et les alentours de la ville.</p>
        </div>

        <div class="bloc">
            <a href="index.php?action=contact"><img src="./public/images/logos/services.png" alt="Logo de personnes"/></a>
            <h2>Services</h2>
            <p>L'ensemble de nos équipe se tiennent prêtes pour toutes vos questions. Contactez-nous par email ou directement à la mairie.</p>
        </div>
    </section>

<?php include('_footer.php'); ?>