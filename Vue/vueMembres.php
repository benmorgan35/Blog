<?php $this->titre = "Inscription d'un nouveau membre"; ?>



<header>
    <?php require 'menuAdmin.php'; ?>


</header>

<div class="titre">
    <div class="row">
        <div class="col-xs-12">
            <h2 id="admin">Administration des membres</h2>
            <hr/>
        </div>
    </div>
</div>


<div class="page">

<section>
    <div class='row'>
        <div class="col-xs-12">
            <h3 id="liste_episodes">Liste des membres inscrits</h3>
            <hr/>
            <table class="table table-hover" cellspacing="0" width="100%">

                <thead>
                <tr>
                    <th>Date d'inscription</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Nom d'utilisateur</th>
                    <th>Mot de passe</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <time style="color:grey; font-size: 0.8em"><i><?= $user['dateCrea'] ?></i></time>
                        </td>
                        <td>
                            <p class=""><?= htmlspecialchars($user['prenom']) ?></p>

                        </td>
                        <td>
                            <p class=""><?= htmlspecialchars($user['nom']) ?></p>

                        </td>
                        <td>
                            <p class=""><?= htmlspecialchars($user['username']) ?></p>
                        </td>
                        <td>
                            <p class=""><?= htmlspecialchars($user['password']) ?></p>
                        </td>
                        <td>
                            <a class="btn btn-primary" style="font-size: 14px;width: 90px;"
                               href="<?= "index.php?action=deleteUser&idU=" . $user['idU'] ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
            <br />
            <hr />
        </div>
    </div>

</section>




    <section>
        <div class='row'>
            <div class="col-xs-12">
                <h3 id="liste_episodes">Inscrire un nouveau membre</h3>
                <hr/>
<br />

        <form method="post" action="<?="index.php?action=inscription"?>">

            <input class="form-control" id="prenom" name="prenom" type="text" placeholder="Prénom" required/>
            <input class="form-control" id="nom" name="nom" type="text" placeholder="Nom" required/>
            <input class="form-control" id="username" name="username" type="text" placeholder="Nom d'utilisateur" required/>
            <input class="form-control" id="password" name="password" type="password" placeholder="Mot de passe" required/>
            <input style="float: right;" type="submit" class="btn btn-primary" value="Enregitsrer"/>
        </form>
        <br/>
        <br />
        <br />
        <br />
        <br />
    </div>
        </div>
</section>
</div>