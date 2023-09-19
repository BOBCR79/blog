
<div class="wrapper">
    <h1>Créer compte</h1>
    <form class="login" action="index.php?c=user&a=create" method="post">
        <?php
            FORM::lbl('Email','email');
            FORM::email('email','email');

            FORM::lbl('Nom','name');
            FORM::txt('name','name');

            FORM::lbl('Mot de passe','pwd');
            FORM::pwd('pwd','pwd');

        ?>
           <button type="submit">Valider</button>
    </form>


</div>







