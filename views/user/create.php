
<div class="wrapper">
    <form action="index.php?c=user&a=create" method="post">
        <?php
            FORM::lbl('Email','email');
            FORM::email('email','email');

            FORM::lbl('Nom','name');
            FORM::txt('name','name');

            FORM::lbl('Mot de passe','pwd');
            FORM::pwd('pwd','pwd');

        ?>
           <input type="submit" value="Créer">
    </form>


</div>





<?php


require 'views/inc/foot.php';