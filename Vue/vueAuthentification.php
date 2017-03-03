<?php $this->titre = "Connexion administrateur"; ?>

<section>
    <div class="titre">
        <h2>Connexion Administrateur</h2>
        <hr/>
    </div>
    <br />
    <br />
    <br />

</section>


<div class="page">

    <div class="row">

    <form method="post" action="<?="index.php?action=connexion"?>">

        <input id="username" name="username" type="text" placeholder="Identifiant" required/><br /><br />

        <input id="password" name="password" type="password" placeholder="Mot de passe" required/> <br /> <br />
        <input type="submit" class="btn btn-primary" value="Valider"/>
    </form>
    <br/>
    <br />
    <br />
    <br />
    <br />
</div>
</div>