<?php
session_start();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>


    <title><?= $titre ?></title>
</head>
<body>

<div class="container-fluid">

    <header>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <p class="navbar-brand"><b>Billet simple pour l'Alaska</b></p>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href=" <?= "index.php" ?>">Accueil</a></li>
                        <li><a href="<?= "index.php#liste_episodes" ?>">Liste des épisodes</a></li>

                    </ul>
                </div>
            </div>
        </nav>


    <br/>

        <div id="contenu">
            <?= $contenu ?>
        </div>



</div>
<footer id="footer" style="background: black">

    <p>Copyright © 2017 Jean Forteroche | Tous droits réservés |
        <a href="<?= "index.php?action=authentification" ?>">Espace Administrateur</a></p>
    <a href="<?= "index.php?action=adminAccueil" ?>">Admintemporaire</a></p>

</footer>

<!-- #global -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/French.json"
            }
        });
    });
</script>


</body>
</html>