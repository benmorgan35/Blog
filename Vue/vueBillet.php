<?php

$this->titre = "Mon Blog - " . $billet['titre']; ?>

<article>
    <header>
        <h2 class="titreBillet2"><?= $billet['titre'] ?></h2>
        <time style="color:grey"><i>Publié le <?= $billet['dateFR'] ?></i></time>
        <hr />
    </header>

    <p><?= $billet['contenu'] ?></p>
</article>
<hr />

<?php require 'form.php'; ?>

<h3 id="titreReponses">Commentaires </h3>

<?php foreach ($commentaires as $commentaire): ?>

<p><b> <?= $commentaire['auteur'] ?></b> - le <?= $commentaire['dateFR'] ?></p>
<p><?= $commentaire['contenu'] ?>
    <input type="button" value="Répondre">

    <hr />

<?php endforeach; ?>
<br />

<br />
<br />