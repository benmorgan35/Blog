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
            <h2 id="admin">Administration des commentaires</h2> <hr />

        </div>
    </div>
    <hr />
    <div class='row'>
        <div class="col-xs-12">

            <table class="table table-hover" cellspacing="0" width="100%">


                <thead>
                <tr>
                    <th>Etat</th>
                    <th>Date de publication</th>
                    <th>contenu</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($adminCommentaires as $commentaire):?>
                    <tr>

                        <td>
                            <?php if($commentaire['signalement'] == 1){echo ' <div style="color: orangered;"> signalé </div>';} else {echo '<div style="color: green;"> OK </div>';} ?>
                        </td>

                        <td>
                            <time style="color:grey; font-size: 0.8em"><i><?= $commentaire['dateCrea'] ?></i></time>
                        </td>
                        <td>
                            <!-- <a href="<?= "index.php?action=billet&idB=" . $billet['idB'] ?>"> -->
                                <p class="contenuCommentaire"><?= $commentaire['contenu'] ?><br />
                          <!--  </a> -->
                        </td>

                        <td>
                            <a class="btn btn-primary" style="font-size: 14px;width: 90px;" href="<?= "index.php?action=supprimerCommentaire&idC=" . $commentaire['idC'] ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
            <br /><br /><br/>
        </div>




</article>
