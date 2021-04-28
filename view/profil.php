<?php
include('_header.php');
include('_navbar.php');
?>

<body>

<h2 class="main profilH2">Espace membre</h2>

<div class="mainProfil">

    <div class="profilContent">

        <?php
        if(!empty($userInfo['avatar'])) { ?>
            <img class="imgProfil" src="./public/images/members/<?php echo htmlspecialchars_decode($userInfo['avatar']);?>" width="150" /><?php
        } ?>

        <div class="profilInfos">
            <h3 class="profilName"> <?php echo htmlspecialchars_decode($userInfo['pseudo'])?></h3>
            <p class="profilEmail">Adresse mail : <?php echo htmlspecialchars_decode($userInfo['email'])?></p>
        </div>

    </div>

    <form action="index.php?action=editAvatar" method="post" enctype="multipart/form-data">
        <h1 class="h3 mb-3 fw-normal">Changer votre avatar</h1>
        <input type="file" name="avatar" class="form-control login-form">
        <button class="btn btn-primary" type="submit">Mettre à jour mon profil</button>
    </form>
</div>

<?php
include('_footer.php');
?>