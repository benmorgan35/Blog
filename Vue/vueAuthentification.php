<?php $this->titre = "Connexion administrateur"; ?>

<div class="titre">
    <div class="row">
        <div class="col-xs-12">
            <h2 id="">Accès à l'interface d'administration du blog</h2>
            <hr/>
        </div>
    </div>
</div>


<div class="page">

    <section>
        <div class="row">
            <div class="col-xs-12">
                <h3>Authentification</h3>
                <hr/>
                <p> Pour accéder à l'interface d'administration du blog de Jean Forteroche, veuillez entrer votre nom
                    d'utilisateur et votre mot de passe. </p>
                <p>Si vous n'êtes pas membre, vous ne pouvez y acceder. <a href=" <?= "index.php" ?>">Retour à la page
                        d'accueil</a></p>
            </div>
        </div>
        <hr/>
        <br/>
    </section>

    <section>
        <div class="row">
            <div class="col-xs-12">
                <form method="post" action="<?= "index.php?action=connexion" ?>">
                    <input class="form-control" id="identifiant" name="username" type="text"
                           placeholder="Nom d'utilisateur" required/>
                    <input class="form-control" id="mdp" name="password" type="password" placeholder="Mot de passe"
                           required/> <br/>
                    <input type="submit" class="btn btn-primary" value="Se connecter"/>
                </form>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
            </div>
        </div>
    </section>

</div>
