<?php include('_header.php');?>
<body>
<?php include('_navbar.php')?>
<div class="main">

        <div class="connexionBloc">
            <img src="./public/images/LP_logo.png" alt="logo du site" class="title_img" />

            <form action="index.php?action=login" method="post">
                <h1 class="h3 mb-3 fw-normal">Connectez-vous</h1>
                <input type="text" name="pseudo" class="form-control login-form" placeholder="Pseudo" required autofocus>
                <input type="password" name="pass" class="form-control login-form" placeholder="Mot de passe" required>
                <button class="btn btn-primary" type="submit">Connexion</button>
            </form>

            <a href="./index.php?action=inscription">Pas encore inscrit ? Inscrivez-vous</a>
        </div>

</div>

<?php include('_footer.php'); ?>