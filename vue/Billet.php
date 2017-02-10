<!doctype html>
<html lang="fr">



<header >
        <h1 class="titreBillet" ><?= $billet['titre'] ?></h1>
<time><?= $billet['date'] ?></time>
</header>
<p><?= $billet['contenu'] ?></p>

<hr/>
<header>
    <h1 id="titreReponses">Réponses à <?= $billet['titre'] ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
    <p><?= $commentaire['pseudo'] ?> dit :</p>
    <p><?= $commentaire['contenu'] ?></p>
<?php endforeach; ?>


<form method="post" action="index.php?action=commenter">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo"
           required/><br/>
    <textarea id="txtCommentaire" name="contenu" rows="4"
              placeholder="Votre commentaire" required></textarea><br/>
    <input type="hidden" name="id" value="<?= $billet['id'] ?>"/>
    <input type="submit" value="Commenter"/>
</form>

</html>