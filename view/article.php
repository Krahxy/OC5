<?php include('_header.php');?>

<body class="bgMairie">

    <?php include("./view/_navbar.php"); ?>

    <div class="main">
        <section id="contentArticle">

                <div class="titleBloc">
                    <img src="./public/images/logos/info.png" alt="Logo d'information" id="infoLogo" />
                    <div class="titleNews">
                        <h2><?php echo htmlspecialchars_decode($articleOnce['title'])?></h2>
                        <p><span>Actualité - </span><?php $newDate = date("d/m/Y", strtotime($articleOnce['date'])); echo $newDate;?></p>
                    </div>
                </div>

                <div class="contentBloc articleBloc">
                    <p><?php echo htmlspecialchars_decode($articleOnce['content'])?></p>
                </div>

        </section>
    </div>

    <?php include('_footer.php');?>