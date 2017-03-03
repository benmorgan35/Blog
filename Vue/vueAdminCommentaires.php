<?php $this->titre = "Administrateur"; ?>

<section>
    <header>

        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <p class="navbar-brand"><b>Espace administrateur</b></p>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a style="padding-left: 50px; width: 20%;" href=" <?= "index.php?action=adminAccueil" ?>">
                                Episodes</a></li>
                        <li><a style="padding-left: 50px; width: 20%;"
                               href=" <?= "index.php?action=adminCommentaires" ?>">Commentaires</a></li>
                        <li><a style="padding-left: 50px; width: 20%;" href=" <?= "index.php?action=deconnexion" ?>">Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <div class="titre">
        <div class="row">
            <div class="col-xs-12">
                <h2 id="admin">Administration des commentaires</h2>
                <hr/>

                <p>Vous avez <?= $nbSignalements ?> commentaire(s) signalé(s)</p>

                <hr/>
            </div>
        </div>
    </div>

    <div class="page">

        <section>
            <div class="row">
                <div class="col-xs-12">

                    <table class="table table-hover" cellspacing="0" width="100%">


                        <thead>
                        <tr>
                            <th>Statut</th>
                            <th>Date de publication</th>
                            <th>contenu</th>
                            <th>Supprimer</th>
                            <th>Annuler le signalement</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($adminCommentaires as $commentaire): ?>
                            <tr>

                                <td>
                                    <?php if ($commentaire['signalement'] > 0) {
                                        echo ' <div style="color: orangered;"> signalé </div>';
                                    } else {
                                        echo '<div style="color: green;"> OK </div>';
                                    } ?>
                                </td>

                                <td>
                                    <time style="color:grey; font-size: 0.8em"><i><?= $commentaire['dateCrea'] ?></i>
                                    </time>
                                </td>
                                <td>
                                    <!-- <a href="<?= "index.php?action=billet&idB=" . $billet['idB'] ?>"> -->
                                    <p class="contenuCommentaire"><?= $commentaire['contenu'] ?><br/>
                                        <!--  </a> -->
                                </td>

                                <td>
                                    <a class="btn btn-primary" style="font-size: 14px;width: 90px;"
                                       href="<?= "index.php?action=supprimerCommentaire&idC=" . $commentaire['idC'] ?>">Supprimer</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" style="font-size: 14px;width: 90px;"
                                       href="<?= "index.php?action=supprimerCommentaire&idC=" . $commentaire['idC'] ?>">Valider</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>
                    <br/><br/><br/>
                </div>
            </div>


        </section>
    </div>