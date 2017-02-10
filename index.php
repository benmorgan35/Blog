<?php
require 'modele/connexion.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Billet simple pour l'Alaska</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="asset/css/style.css" rel="stylesheet">
</head>


<body>

<nav>
    <?php require_once 'vue/Menu.php'; ?>
</nav>

<header>
    <?php require_once 'vue/Entete.php'; ?>
</header>


<!-- content -->

<content>
<?php require_once 'vue/Accueil.php'; ?>

</content>
<footer>
    <?php require_once 'vue/Footer.php'; ?>
</footer>


<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script>$(document).ready(function () {
        $('#tableau').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.13/i18n/French.json'
            }
        });
    });</script>

</body>
</html>
