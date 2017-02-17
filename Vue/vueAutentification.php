<?php $this->titre = "Mon Blog Authentification"; ?>

<article>
    <header>
        <h2> Connexion</h2>

        <hr/>
    </header>

    <form method="post" action="index.php?action=connexion">
        <label for="username"> Identifiant : <label>
        <input id="username" name="username" type="text" placeholder="Identifiant" required/><br /><br />
         <label for="password"> Mot de passe : </label>
        <input id="password" name="password" type="password" placeholder="Identifiant" required/> <br />
        <input type="submit" class="btn btn-primary" value="Valider"/>
    </form>
    <br/>
    <br/>