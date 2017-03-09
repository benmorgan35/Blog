<?php $this->titre = "Administrateur"; ?>

<section>
    <header>

        <?php require 'menuAdmin.php'; ?>

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

                    <h3>Liste des commentaires</h3>
<br />
                    <table class="table table-hover" cellspacing="0" width="100%">


                        <thead>
                        <tr>
                            <th>Statut</th>
                            <th>Date de publication</th>
                            <th>contenu</th>
                            <th></th>
                            <th></th>
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
                                    <!--<a href="<?= "index.php?action=billetCom&idB=" . $billet['idB'] . "&idC=" . $billet['idC'] ?>">-->
                                    <p class="contenuCommentaire"><?= htmlspecialchars($commentaire['contenu']) ?><br/>
                                    </p>
                                    <!--</a>-->
                                </td>



                                <td>
                                    <?php if ($commentaire['is_deleted'] != 1) {

                                    echo
                                    '<a class="btn btn-primary" style="font-size: 14px;width: 90px;"
                                       href="' . "index.php?action=supprimerCommentaire&idC=" . $commentaire['idC'] . '">Supprimer'; echo '</a>'; } ?>
                                </td>
                                <td>
                                    <?php if ($commentaire['is_deleted'] != 1) {
                                    echo
                                    '<a class="btn btn-primary" style="font-size: 14px;width: 90px;"
                                       href="' . "index.php?action=annulerSignalement&idC=" . $commentaire['idC'] . '">Valider'; echo '</a>'; } ?>
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