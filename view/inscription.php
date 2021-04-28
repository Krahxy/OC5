<?php include('_header.php');?>
    <body>

    <?php include('_navbar.php')?>

    <div class="main">

            <div class="connexionBloc">
                <img src="./public/images/LP_logo.png" alt="logo du site" class="title_img" />

                <form action="index.php?action=signupEnd" method="post">
                    <h1 class="h3 mb-3 fw-normal">Inscrivez-vous</h1>
                    <input type="text" name="pseudo" class="form-control login-form" placeholder="Pseudo" required autofocus>
                    <input type="password" name="pass" class="form-control login-form" placeholder="Mot de passe" required>
                    <input type="password" name="pass2" class="form-control login-form" placeholder="Mot de passe (vérification)" required>
                    <input type="email" name="email" class="form-control login-form" placeholder="E-mail" required>
                    <button class="btn btn-primary" type="submit">Je m'inscris !</button>
                </form>

                <a href="./index.php?action=connexion">Déjà inscrit ? Connectez-vous !</a>
            </div>

    </div>

    <?php include('_footer.php'); ?>