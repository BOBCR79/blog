<div class="card">
   <form class ="login" action="index.php?c=user&a=login" method="post">
    <?php
        FORM::lbl('Email','email');
        FORM::email('email','email');

        FORM::lbl('Mot de passe','pwd');
        FORM::pwd('pwd','pwd');

    ?>
    <button type="submit">Valider</button>
   </form>

</div>

