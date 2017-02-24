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

<form method="post" action="index.php?action=addBillet">
    <input id="titreBillet" name="titreBillet" type="text" placeholder="titre du billet"
           required /><br />
    <textarea id="txtBillet" name="contenu" rows="4"
              placeholder="Votre billet" required></textarea><br />

    <input type="submit" value="Créer un billet" />
</form>




</html>