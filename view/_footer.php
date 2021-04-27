<footer class="footer">

    <div class="footerBloc">
        <h2>Mon compte</h2>
        <nav>
            <ul>
                <li><a href="index.php?action=inscription">CRÉER UN COMPTE</a></li>
                <?php echo isset($_SESSION['pseudo']) ? '<li><a href="index.php?action=deconnexion">SE DECONNECTER</a></li>' : '<li><a href="index.php?action=connexion">SE CONNECTER</a></li>' ?>
                <?php echo isset($_SESSION['pseudo']) ? '<li><a href="index.php?action=profil">ESPACE PERSO</a></li>' : '' ?>
            </ul>
        </nav>
    </div>
    <div class="footerBloc">
        <h2>Contact</h2>
        <nav>
            <ul>
                <li><a href="index.php?action=contact">CONTACT</a></li>
            </ul>
        </nav>
    </div>

</footer>

<!-- LIST DES SCRIPTS -->
<script src="./public/js/admin.js"></script>  
<script src="./public/js/menus.js"></script>  
<script src="./public/js/weather.js"></script>
<script src="./public/js/main.js"></script>

</body>
</html>