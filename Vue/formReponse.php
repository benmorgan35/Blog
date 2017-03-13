<form method="post" action=" <?= "index.php?action=repondre" ?>">
    <input class="form-control" id="auteur" name="auteur" type="text" placeholder="  Pseudo" required/>
    <textarea id="txtCommentaire" name="contenu" rows="4" class="form-control" placeholder="Commentaire" required></textarea><br/>
    <input type="hidden" name="idC" value="<?= $commentaire['idC'] ?>"/>
    <input type="hidden" name="idB" value="<?= $commentaire['idB'] ?>"/>
    <input type="hidden" name="idParent" value="<?= $commentaire['idParent'] ?>"/>
    <input type="hidden" name="profondeur" value="<?= $commentaire['profondeur'] ?>"/>
    <input type="submit" class="btn btn-primary" value="Valider"/>
</form>
<br/><br/>
