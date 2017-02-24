<header>
    <h2 id="titreReponse">Répondre à un commentaire </h2>
    <h3 class="titreReponse"><?= $commentaire['titre'] ?></h3>
    <time style="color:grey"><i>Publié le <?= $commentaire['dateCrea'] ?></i></time>
    <p><?= $commentaire['contenu'] ?></p>
    <hr/>
</header>


<form method="post" action="index.php?action=repondre">
    <input id="auteur" name="auteur" type="text" placeholder="  Votre pseudo"
           required/><br/><br/>
    <textarea id="txtCommentaire" name="contenu" rows="4" class="form-control"
              placeholder="Votre commentaire" required></textarea><br/>

 <input type="hidden" name="idB" value="<?= $billet['idB'] ?>"/>
<input type="hidden" name="idC" value="<?= $commentaire['idC'] ?>"/>
    <input type="submit" class="btn btn-primary" value="Valider"/>
</form>
