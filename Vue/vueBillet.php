<?php

$this->titre = "Mon Blog - " . htmlspecialchars($billet['titre']); ?>


<section>
    <div class="titre">
        <h2 class="titreBillet2"><?= htmlspecialchars($billet['titre']) ?></h2>
        <time style="color:grey"><i>Publié le <?= $billet['date_fr'] ?></i></time>
        <hr/>
    </div>
</section>

<div class="page">

    <section>

        <p><?= ($billet['contenu']) ?></p>
        <br/>
        <hr/>

    </section>


    <section>
        <?php require 'form.php'; ?>
    </section>

    <section>
        <h3>Commentaires </h3>

        <?php function afficherCommentaires($commentaires, $commentaireModele)
        {
            foreach ($commentaires as $commentaire) :
                echo '<div class="indent">';

                echo ' <p><b> ' . htmlspecialchars($commentaire['auteur']) . '</b> - le  ' . $commentaire['date_fr'] . ' <br/><i>' . htmlspecialchars($commentaire['contenu']) . ' </i><br />';

                if ($commentaire['signalement'] > 0) {
                    echo '<p style="color: dodgerblue; font-style : italic; "> (Ce message a été signalé au modérateur)';
                    echo '</p>';
                }

                echo '<p>';

                if ($commentaire['is_deleted'] == 0) {
                    if ($commentaire['profondeur'] < 3) {
                        echo '<a class="btn btn-primary" style="font-size: 10px;" href=" ' . "index.php?action=commentaire&idB=" . $commentaire['idB'] . "&idC=" . $commentaire['idC'] . '">Répondre';
                        echo '</a>';
                    }
                    echo '<a class="btn btn-primary" style="font-size: 10px; background: darkgrey; border-color: grey; width: 70px; margin-left: 20px;" href=" ' . "index.php?action=signalerCommentaire&idC=" . $commentaire['idC'] . '">Signaler';
                    echo '</a>';

                }
                echo '</p>';
                //echo '</p>';

                afficherCommentaires($commentaireModele->getCommentaireChilds($commentaire['idC']), $commentaireModele);

                echo '</div>';
            endforeach;
        } ?>

        <?php afficherCommentaires($commentaires, $commentaireModele); ?>

        <br/>
        <br/>

    </section>
</div>