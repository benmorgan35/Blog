<?php $this->titre = "Administrateur"; ?>

<article>
    <header>

        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand"><b>Espace Administrateur</b></a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href=" <?= "index.php?action=adminAccueil" ?>"> Episodes</a></li>
                <li><a href=" <?= "index.php?action=adminCommentaires" ?>">Commentaires</a></li>
                <li><a href=" <?= "index.php?action=deconnexion" ?>">Déconnexion</a></li>
                <!
            </ul>
        </nav>

    </header>


        <div class="row">
            <div class="col-xs-12">
                <h2 id="admin">Administration des épisodes</h2> <hr />

                <h3>Ajouter un épisode


                <a class="btn btn-primary" style="float: right; margin-right: 2%; width:90px;" href="<?= "index.php?action=addBillet" ?>">Valider</a></h3>
    </div>
    </div>
    <hr />
                <div class='row'>
                    <div class="col-xs-12">
                    <h3>Modifier ou supprimer un épisode existant</h3> <hr />
                    <table class="table table-hover" cellspacing="0" width="100%">


                        <thead>
                        <tr>
                            <th>Date de publication</th>
                            <th>Episodes</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($billets as $billet):?>
                            <tr>
                                <td>
                                    <time style="color:grey; font-size: 0.8em"><i><?= $billet['dateCrea'] ?></i></time>
                                </td>
                                <td>
                                    <a href="<?= "index.php?action=billet&idB=" . $billet['idB'] ?>">
                                        <p class="titreBillet"><?= $billet['titre'] ?><br />
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" style="font-size: 14px; width: 90px;" href="<?= "index.php?action=modifierBiller&idB=" . $billet['idB'] ?>">Modifier</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" style="font-size: 14px;width: 90px;" href="<?= "index.php?action=supprimerBillet&idB=" . $billet['idB'] ?>">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>
                    <br /><br /><br/>
                </div>




</article>
<hr/>