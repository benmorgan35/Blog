<?php

$this->titre = "Mon Blog - " . $billet['titre']; ?>


<section>
    <div class="titre">
        <h2 class="titreBillet2"><?= $billet['titre'] ?></h2>
        <time style="color:grey"><i>Publié le <?= $billet['dateCrea'] ?></i></time>
        <hr/>
    </div>
</section>

<div class="page">

    <section>

        <p><?= $billet['contenu'] ?></p>

        <hr/>

    </section>
    <section>
        <?php require 'form.php'; ?>
    </section>

    <section>
        <h3 id="titreReponses">Commentaires </h3>


        <?php foreach ($commentaires as $commentaire) : ?>
            <div class="foreach1">

                <p><b> <?= $commentaire['auteur'] ?></b> - le <?= $commentaire['dateCrea'] ?><br/>
                    <?= $commentaire['contenu'] ?></p>
                <a class="btn btn-primary" style="font-size: 10px;"
                   href="<?= "index.php?action=commentaire&idB=" . $commentaire['idB'] . "&idC=" . $commentaire['idC'] ?>">Répondre</a>
                <a class="btn btn-primary"
                   style="font-size: 10px; background: darkgrey; border-color: grey; width: 70px;"
                   href="<?= "index.php?action=signalerCommentaire" ?>">Signaler</a>


                <?php foreach ($reponsesCommentaire as $commentaire) : ?>
                    <div class="foreach2">
                        <div class="comment1">

                            <p><b> <?= $commentaire['auteur'] ?></b> - le <?= $commentaire['dateCrea'] ?><br/>
                                <?= $commentaire['contenu'] ?></p>
                            <a class="btn btn-primary" style="font-size: 10px;"
                               href="<?= "index.php?action=commentaire&idB=" . $commentaire['idB'] . "&idC=" . $commentaire['idC'] ?>">Répondre</a>
                            <a class="btn btn-primary"
                               style="font-size: 10px; background: darkgrey; border-color: grey;width: 70px;"
                               href="<?= "index.php?action=signalerCommentaire&idB=" . $commentaire['idB'] . "&idC=" . $commentaire['idC'] ?>">Signaler</a>
                        </div>


                        <?php foreach ($reponsesReponse as $commentaire) : ?>
                            <div class="foreach3">
                                <div class="comment2">

                                    <p><b> <?= $commentaire['auteur'] ?></b> - le <?= $commentaire['dateCrea'] ?><br/>
                                        <?= $commentaire['contenu'] ?></p>
                                    <a class="btn btn-primary"
                                       style="font-size: 10px; background: darkgrey; border-color: grey;width: 70px;"
                                       href="<?= "index.php?action=signalerCommentaire&idB=" . $commentaire['idB'] . "&idC=" . $commentaire['idC'] ?>">Signaler</a>
                                </div>

                            </div>
                        <?php endforeach; ?>

                    </div>
                <?php endforeach; ?>

            </div>
        <?php endforeach; ?> <br/>

        <br/>


        <br/>

    </section>
</div>