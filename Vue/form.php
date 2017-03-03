<section>

    <h3 id="titreReponses">Ecrire un commentaire </h3>

    <form method="post" action="<?= "index.php?action=commenter" ?>">
        <input id="auteur" name="auteur" type="text" placeholder="  Votre pseudo"
               required/><br/><br/>
        <textarea id="txtCommentaire" name="contenu" rows="4" class="form-control"
                  placeholder=" Votre commentaire" required></textarea><br/>
        <input type="hidden" name="idB" value="<?= $billet['idB'] ?>"/>
        <input type="submit" class="btn btn-primary" value="Valider"/>
    </form>
    <hr/>

</section>