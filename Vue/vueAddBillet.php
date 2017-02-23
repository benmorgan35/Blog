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
    <h3 id="adBillet">Ajouter un épisode </h3>
</header>

<form action="vueAddBillet.php" method="post"> <textarea style="width: 100%;" name="content">&lt;br /&gt; </textarea>
    <input name="send" type="submit" value="Envoyer" />
</form>




</html>