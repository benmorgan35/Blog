<?php

$this->titre = "Mon Blog - " . $billet['titre']; ?>

<article>
    <header>
        <h2 class="titreBillet2"><?= $billet['titre'] ?></h2>
        <time style="color:grey"><i>Publié le <?= $billet['dateCrea'] ?></i></time>
        <hr/>
    </header>

    <p><?= $billet['contenu'] ?></p>
</article>
<hr/>

<?php require 'form.php'; ?>

<h3 id="titreReponses">Commentaires </h3>


<?php foreach ($commentaires as $commentaire) : ?>
    <div class="foreach1">

    <p><b> <?= $commentaire['auteur'] ?></b> - le <?= $commentaire['dateCrea'] ?><br />
        <?= $commentaire['contenu'] ?></p>
    <a class="btn btn-primary" style="font-size: 10px;" href="<?= "index.php?action=commentaire&idB=" . $commentaire['idB'] . "&idC=" . $commentaire['idC'] ?>">Répondre</a>
        <a class="btn btn-primary" style="font-size: 10px; background: darkgrey; border-color: grey; width: 70px;" href="<?= "index.php?action=signaler&idB=" . $commentaire['idB'] . "&idC=" . $commentaire['idC'] ?>">Signaler</a>


    <?php foreach ($reponsesCommentaire as $commentaire) : ?>
    <div class="foreach2">
        <div class="comment1">

            <p><b> <?= $commentaire['auteur'] ?></b> - le <?= $commentaire['dateCrea'] ?><br />
            <?= $commentaire['contenu'] ?></p>
            <a class="btn btn-primary" style="font-size: 10px;" href="<?= "index.php?action=commentaire&idB=" . $commentaire['idB'] . "&idC=" . $commentaire['idC'] ?>">Répondre</a>
            <a class="btn btn-primary" style="font-size: 10px; background: darkgrey; border-color: grey;width: 70px;"   href="<?= "index.php?action=signaler&idB=" . $commentaire['idB'] . "&idC=" . $commentaire['idC'] ?>">Signaler</a>
        </div>


        <?php foreach ($reponsesReponse as $commentaire) : ?>
            <div class="foreach3">
            <div class="comment2">

                <p><b> <?= $commentaire['auteur'] ?></b> - le <?= $commentaire['dateCrea'] ?><br />
                <?= $commentaire['contenu'] ?></p>
                <a class="btn btn-primary" style="font-size: 10px; background: darkgrey; border-color: grey;width: 70px;" href="<?= "index.php?action=signaler&idB=" . $commentaire['idB'] . "&idC=" . $commentaire['idC'] ?>">Signaler</a>
            </div>

            </div>
        <?php endforeach; ?>

        </div>
    <?php endforeach; ?>

    </div>
<?php endforeach; ?> <br/>

<br />



<br/>
