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

    <?php if ($commentaire['profondeur'] >= 0) : ?>
        <p><b> <?= $commentaire['auteur'] ?></b> - le <?= $commentaire['dateCrea'] ?></p>
        <p><?= $commentaire['contenu'] ?></p>
        <a href="<?= "index.php?action=commentaire&idB=" . $commentaire['idB'] . "&idC=" . $commentaire['idC'] ?>">Répondre</a>


        <?php foreach ($commentaires as $commentaire) : ?>
            <?php if ($commentaire['profondeur'] != 0) : ?>

                <div class="comment1">
                    <p><b> <?= $commentaire['auteur'] ?></b> - le <?= $commentaire['dateCrea'] ?></p>
                    <p><?= $commentaire['contenu'] ?></p>
                    <a href="<?= "index.php?action=commentaire&idB=" . $commentaire['idB'] . "&idC=" . $commentaire['idC'] ?>">Répondre</a>
                </div>

                <?php foreach ($commentaires as $commentaire): ?>
                    <?php if ($commentaire['profondeur'] == 2) : ?>

                        <div class="comment2">
                            <p><b> <?= $commentaire['auteur'] ?></b> - le <?= $commentaire['dateCrea'] ?></p>
                            <p><?= $commentaire['contenu'] ?></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            <?php endif; ?>
        <?php endforeach; ?>

    <?php endif; ?>
    <hr/>
<?php endforeach; ?>




<br/>
