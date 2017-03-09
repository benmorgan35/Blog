<br/>
<h3 id="titreReponses">Ecrire un commentaire </h3>
<br>

<form method="post" action="<?= "index.php?action=commenter" ?>">
    <input class="form-control" id="auteur" name="auteur" type="text" placeholder="Pseudo" required/>
    <textarea id="txtCommentaire" name="contenu" rows="4" class="form-control" placeholder=" Commentaire" required></textarea><br/>
    <input type="hidden" name="idB" value="<?= $billet['idB'] ?>"/>
    <input type="submit" style="float: right;" class="btn btn-primary" value="Valider"/>
</form>
<br/>
<br/>
<hr/>

