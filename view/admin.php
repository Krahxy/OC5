<?php include('_header.php');?>

<body class="bodyAdmin">

<?php   if (isset($_SESSION['status'])) {
            if ($_SESSION['status'] == 1) { ?>


                <nav class="connectBar topNavAdmin">
                    <ul>
                        <li><a href="index.php?action=home"><i class="fas fa-home"></i>Acceuil</a></li>
                        <li><a href="index.php?action=actualites"><i class="fas fa-book"></i>Actualités</a></li>
                    </ul>
                </nav>

                <section class="adminContent">

                    <div class="leftNavAdmin">  <!-- BOUTONS SUR LE COTÉ GAUCHE -->
                        <nav id="creationNav">
                            <ul>
                                <li><a class="btn btn-primary" id="createActualityBtn" href="#" role="button"><span class="glyphicon glyphicon-plus"></span></i> Créer une actualité</a></li>
                                <li><a class="btn btn-primary" id="displayUsersBtn" href="#" role="button"><span class="glyphicon glyphicon-plus"></span></i> Liste inscrits</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="actualityContent modalView"> <!-- FORMULAIRE D'ENVOI ARTICLE -->
                        <form action="index.php?action=postArticle" method="post">
                            <input type="text" placeholder="Titre de l'actualité" name="title" class="form-control"/> <br /><br />
                            <textarea class="mytextarea" placeholder="Écrivez une nouvelle actualité" name="content"></textarea></br>
                            <input type="submit" class="btn btn-primary"/>
                        </form>
                    </div>

                    <div class="usersList modalView">
                        <table class="userTable">
                            <thead>
                                <tr>
                                    <th scope="col">Pseudo</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Admin</th>
                                    <th scope="col">Modération</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php 
                            while ($user = $users -> fetch()) { ?>
                                <tr>
                                    <th scope="col"><?php echo htmlspecialchars_decode($user['pseudo']); ?></th>
                                    <th scope="col"><?php echo htmlspecialchars_decode($user['email']) ?></th>
                                    <th scope="col"><?php echo htmlspecialchars_decode($user['admin']) == 1 ? 'Oui' : 'Non';?></th>
                                    <th scope="col">
                <?php                   if ($user['admin'] == 1) {
                                            echo 'Déjà admin';
                                        } else { ?>
                                            <a href="index.php?action=updateRole-id-<?php echo htmlspecialchars_decode($user['id']);?>-admin-<?php echo htmlspecialchars_decode($user['admin']);?>" class="btn btn-warning">Passer admin</a>
                                    </th><?php
                                    }?>
                                </tr>
                        <?php
                            } ?>
                            </tbody>
                        </table>
                        </div>

                </section>

                <script>
                    tinymce.init({
                        selector: '.mytextarea'
                    });
                </script>

<?php include('_footer.php');?>

    <?php   } else { echo "Vous devez être administrateur pour voir cette page";}
        }?>

