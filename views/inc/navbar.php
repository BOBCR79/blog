<header>
    <!-- if connected -->
    <?php if (isset($_SESSION[APP_TAG]['connected']['use_login'])):?>
    <nav>        
        <ul>
            <li><a href="">Acceuil</a></li>
            <li><a href="">Nouvel article</a></li>
            <li><a href="">Options</a></li>
            <li><a href="">Quitter</a></li>
        </ul>
    </nav>
    <?php endif ?>
</header>