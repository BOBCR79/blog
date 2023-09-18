<header>
    <!-- if connected -->
    <?php if (isset($_SESSION[APP_TAG]['connected']['use_login'])):?>
    <nav class="wrapper">        
        <ul class="navbar">
            <li><a href="">Acceuil</a></li>
            <li><a href="">Nouvel article</a></li>
            <li><a href="">Options</a></li>
            <li><a href="">Quitter</a></li>
        </ul>
    </nav>
    <?php else:?>
        <nav class="wrapper">        
            <ul class="unlogged">
                <li><a href="">Connexion</a></li>
                <li><a href="index.php?c=user&a=subscribe">Inscription</a></li>            
            </ul>
    </nav>
    <?php endif ?>
    <h1>Titre Blog</h1>
</header>