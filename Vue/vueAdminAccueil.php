<?php $this->titre = "Administrateur"; ?>


<header>

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
                <h2 id="admin">Administration des épisodes</h2>
                <hr/>
            </div>
        </div>
    </div>

    <div class="page">

        <section>
            <div class="row">
                <div class="col-xs-12">
                    <h3>Ajouter un épisode
                        <a class="btn btn-primary" style="float: right; margin-right: 2%; width:90px;"
                           href="<?= "index.php?action=ajouterBillet" ?>">Valider</a></h3>
                </div>
            </div>
            <hr/>
        </section>
        <section>
            <div class='row'>
                <div class="col-xs-12">
                    <h3>Modifier ou supprimer un épisode existant</h3>
                    <hr/>
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
                        <?php foreach ($billets as $billet): ?>
                            <tr>
                                <td>
                                    <time style="color:grey; font-size: 0.8em"><i><?= $billet['dateCrea'] ?></i></time>
                                </td>
                                <td>
                                    <a href="<?= "index.php?action=billet&idB=" . $billet['idB'] ?>">
                                        <p class="titreBillet"><?= $billet['titre'] ?><br/>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" style="font-size: 14px; width: 90px;"
                                       href="<?= "index.php?action=updateBillet&idB=" . $billet['idB'] ?>">Modifier</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" style="font-size: 14px;width: 90px;"
                                       href="<?= "index.php?action=supprimerBillet&idB=" . $billet['idB'] ?>">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>
                    <br/><br/><br/>
                </div>

                <hr/>

        </section>
    </div>