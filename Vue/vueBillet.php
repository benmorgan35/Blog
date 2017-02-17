<?php $this->titre = "Mon Blog - " . $billet['titre']; ?>

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

    <p><b>Commentaire de <?= $commentaire['auteur'] ?><input type="submit" style="float:right" value="Répondre" /></p> <p> </b>le <?= $commentaire['dateFR'] ?></p>
    <p><?= $commentaire['contenu'] ?></p>

<?php endforeach; ?>
<br />

<br />
<br />

