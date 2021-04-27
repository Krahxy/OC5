<?php include('_header.php');?>

<body class="bodyAdmin">
        <nav class="connectBar topNavAdmin">
            <ul>
                <li><a href="index.php?action=admin"><i class="fas fa-user"></i>Administration</a></li>
                <li><a href="index.php?action=actualites"><i class="fas fa-book"></i>Actualités</a></li>
                <li><a href="#"><i class="fas fa-running"></i>Activités</a></li>
            </ul>
        </nav>

<section class="adminContent">

    <section class="actualityContent">
        <h2>Vous pouvez modifier votre article ci-dessous<br /></h2>
        <form action="index.php?action=editPanelPost-id-<?php echo $articleOnce['id']?>" method="post">
            </br></br>
            <div class="page_title">
                <input type="text" placeholder="Titre" value="<?php echo $articleOnce['title']?>" name="title" class="form-control title" />
            </div></br></br>
            <textarea class="mytextarea" placeholder="Racontez-nous une histoire" name="content" cols="50" rows="8"><?php echo $articleOnce['content']?></textarea> </br>
            <input type="submit" class="btn btn-primary" />
        </form>
    </section>

</section>

    <script>
        tinymce.init({
            selector: '.mytextarea'
        });
    </script>
    
<?php include('_footer.php');?>