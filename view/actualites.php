<?php include('_header.php');?>
<body>
<?php include('_navbar.php')?>

    <section class="main">
        <div class="News">
            <?php
            while ($article = $articles -> fetch()) { ?>
                <div class="titleBloc articleBloc">
                    <img src="./public/images/logos/info.png" alt="Logo d'information" id="infoLogo" />
                    <div class="titleNews">
                        <h2><?php echo htmlspecialchars($article['title']) ?></h2>
                        <p><span>Actualité - </span><?php $newDate = date("d/m/Y", strtotime($article['date'])); echo $newDate;?></p>
                    </div>
                    
                    <div class="buttonsArticle">
                        <a href="index.php?action=article-id-<?php echo htmlspecialchars_decode($article['id']); ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
<?php                   if (isset($_SESSION['status'])) {
                            if ($_SESSION['status'] == 1) { ?>
                                <a href="index.php?action=articleUpdate-id-<?php echo htmlspecialchars_decode($article['id']); ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                <a href="index.php?action=articleDelete-id-<?php echo htmlspecialchars_decode($article['id']); ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                    <?php   }
                        }?>
                    </div>
                </div>
                <?php
            }; ?>
        </div>
    </section>

<?php include('_footer.php'); ?>