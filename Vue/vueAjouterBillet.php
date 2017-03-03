<?php
// Démarrage de la session AVANT d'écrire du code HTML a n de // conserver l'information indiquant si c'est le premier accès // et pour transmettre le tableau des personnes session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title></title>
    <!-- Feuille de style -->
    <link href="" rel="stylesheet" type="text/css"/>
    <script src="../assets/js/tinymce/themes/tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        tinyMCE.init({
            mode: "textareas",
            language: "fr",
            theme: "advanced",
            plugins: "table, fullpage",
            theme_advanced_buttons3_add: "fullpage, tablecontrols"
        });
    </script>
</head>
<section>
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <p class="navbar-brand"><b>Espace administrateur</b></p>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a style="padding-left: 50px; width: 20%;" href=" <?= "index.php?action=adminAccueil" ?>">
                            Episodes</a></li>
                    <li><a style="padding-left: 50px; width: 20%;" href=" <?= "index.php?action=adminCommentaires" ?>">Commentaires</a>
                    </li>
                    <li><a style="padding-left: 50px; width: 20%;" href=" <?= "index.php?action=deconnexion" ?>">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>

<div class="page">

    <section>
        <div class="row">
            <div class="col-xs-12">
                <h2 id="admin">Ajouter un épisode</h2>
                <hr/>
                <br/>


                <form method="post" action="<?= "index.php?action=addBillet" ?>">
                    <input id="titreBillet" name="titre" type="text" class="form-control"
                           placeholder=" titre de l'épisode"
                           required><br/>
                    <textarea id="txtBillet" name="contenu" rows="20" class="form-control"
                              placeholder=" Contenu" required></textarea><br/>
                    <!--<input class="btn btn-primary" style="float: left" type="submit"
                           value="Enregistrer en tant que brouillon"/> -->
                    <input class="btn btn-primary" style="margin-left:50px; float: right" type="submit"
                           value="Publier"/>
                </form>

            </div>
        </div>

        <br/><br/>
    </section>
</div>
</html>