<?php $this->titre = "Ajouter un épisode"; ?>

<?php /*
if(isset($_SESSION['USER'])){
header('Location: index.php?action=adminAccueil');
}
else {
header('Location: index.php?action=accueil');
}
*/ ?>

    <header>

        <?php require 'menuAdmin.php'; ?>

    </header>

    <div class="titre">
        <div class="row">
            <div class="col-xs-12">
                <h2 id="admin">Ecrire un nouvel épisode</h2>
                <hr/>

            </div>
        </div>
    </div>

    <div class="page">

        <section>
            <div class="row">
                <div class="col-xs-12">
                    <hr/>
                    <form method="post" action="<?= "index.php?action=addBillet" ?>">
                        <input id="titrenouveauBillet" name="titre" type="text" class="form-control"
                               placeholder="titre de l'épisode"
                               required><br/>
                        <textarea id="txtBillet" name="contenu" rows="30" class="form-control" placeholder="Texte"
                                  required> </textarea><br/>
                        <input class="btn btn-primary" type="submit" name="action" value="brouillon"/>
                        <input class="btn btn-primary" style="margin-left:50px; float: right" type="submit"
                               name="action" value="publier"/>
                    </form>
                </div>
            </div>
            <br/><br/>
        </section>
    </div>