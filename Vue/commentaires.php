<?php

foreach ($commentaires as $commentaire) : ?>

<div class="indent">
    <p>
        <strong> <?=htmlspecialchars($commentaire['auteur'])?></strong> - <?= $commentaire['date_fr']?> <br/>
        <em><?= htmlspecialchars($commentaire['contenu']) ?></em><br>
    </p>

    <?php if ($commentaire['signalement'] > 0) { ?>
    <p class="commentaireMessageSignalement"> (Ce message a été signalé au modérateur)</p>
    <?php } ?>

    <p>
        <?php if ($commentaire['is_deleted'] == 0) {
            if ($commentaire['profondeur'] < 3) { ?>
                <a class="btn btn-primary commentaireBoutonReponse"  href="index.php?action=commentaire&idB=<?=$commentaire['idB']?>&idC=<?=$commentaire['idC']?>">Répondre</a>
            <?php } ?>
            <a class="btn btn-primary commentaireBoutonSignaler"  href=" index.php?action=signalerCommentaire&idC=<?=$commentaire['idC']?>">Signaler</a>
        <?php } ?>
    </p>

    <?php $commentaires = $commentaireModele->getCommentaireChilds($commentaire['idC']); ?>
   <?php include 'commentaires.php'; ?>

</div>

<?php endforeach; ?>




