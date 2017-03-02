<?php
// Démarrage de la session AVANT d'écrire du code HTML a n de // conserver l'information indiquant si c'est le premier accès // et pour transmettre le tableau des personnes session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <!-- Feuille de style -->
    <link href="" rel="stylesheet" type="text/css" />
    <script src="../assets/js/tinymce/themes/tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        tinyMCE.init({
            mode : "textareas",
            language : "fr",
            theme : "advanced",
            plugins : "table, fullpage",
            theme_advanced_buttons3_add : "fullpage, tablecontrols"
        });
    </script>
</head>
<header>
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand"><b>Espace Administrateur</b></a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="<?= "index.php?action=adminAccueil" ?>">Episodes</a></li>
            <li><a href="<?= "index.php?action=adminCommentaires" ?>">Commentaires</a></li>
            <li><a href="<?= "index.php?action=deconnexion" ?>">Déconnexion</a></li>
            <!
        </ul>
    </nav>

</header>


<div class="row">
    <div class="col-xs-12">
        <h2 id="admin">Modifier l'épisode</h2> <hr />



        <form method="post" action="<?="index.php?action=addBillet"?>">
            <input id="titreBillet" name="titreBillet" type="text" class="form-control" placeholder="titre de l'épisode" value="<?= $billet['titre'] ?>"
                   required ><br />
            <textarea id="txtBillet" name="contenuBillet" rows="30" class="form-control" placeholder="Texte" required ><?= $billet['contenu'] ?>" </textarea><br />
            <input class="btn btn-primary" style="float: left" type="submit" value="Enregistrer en tant que brouillon" />
            <input class="btn btn-primary" style="margin-left:50px; float: right" type="submit" value="Publier" />
        </form>

    </div>
</div>

<br /><br />

