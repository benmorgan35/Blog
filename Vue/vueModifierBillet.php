<?php $this->titre = "Ajouter un épisode"; ?>

<script src="assets/js/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script type="text/javascript">
    tinyMCE.init({
        mode: "textareas",
        language: "fr",
        theme: "advanced",
        entity_encoding : "raw"
    });
</script>

<header>
    <?php require 'menuAdmin.php'; ?>
</header>

<div class="titre">
    <div class="row">
        <div class="col-xs-12">
            <h2 id="admin">Modifier un épisode</h2>
            <hr/>

        </div>
    </div>
</div>


    <div class="page">
        <section>
            <div class="row">
                <div class="col-xs-12">
                 <hr/>
                    <form method="post" action="<?= "index.php?action=updateBillet&idB=" . $billet['idB'] ?>">
                        <input id="titreBillet" name="titre" type="text" class="form-control"
                               placeholder="titre de l'épisode" value="<?= htmlspecialchars($billet['titre']) ?>"
                               required><br/>
                        <textarea id="txtBillet" name="contenu" rows="30" class="form-control" placeholder="Texte"
                                  required><?= $billet['contenu'] ?>" </textarea><br/>
                        <input type="hidden" name="idBillet" value="<?= $billet['idB'] ?>"/>
                        <input class="btn btn-primary" type="submit" name="action" value="brouillonModif"/>
                        <input class="btn btn-primary" style="margin-left:50px; float: right" type="submit"
                               name="action" value="publierModif"/>
                    </form>
                </div>
            </div>
            <br/><br/>
        </section>
    </div>
