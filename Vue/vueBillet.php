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

        <?php include 'commentaires.php'; ?>

        <br/>
        <br/>

    </section>
</div>