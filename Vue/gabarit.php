<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css"/>

    <script src="assets/js/tiny_mce/tiny_mce.js" type="text/javascript"></script>
    <script type="text/javascript">
        tinyMCE.init({
            mode: "exact",
            elements: "txtBillet",
            language: "fr",
            theme: "advanced",
            entity_encoding: "raw"
        });
    </script>


    <title><?= $titre ?></title>
</head>
<body>

<div class="container-fluid">


    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href=" <?= "index.php#presentation" ?>"><b>Billet simple pour l'Alaska</b></a>
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
                    <li><a href=" <?= "index.php" ?>">Accueil</a></li>
                    <li><a href="<?= "index.php#episodes" ?>">Liste des épisodes</a></li>
                </ul>
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<ul>';
                    echo '<div class="nav navbar-nav navbar-right">';
                    echo '<li><a href="' . "index.php?action=adminAccueil" . '">Interface admin';
                    echo '<li><a href="' . "index.php?action=deconnexion" . '">Déconnexion';
                    echo '</a></li>';
                    echo '</div>';
                    echo '</ul>';
                } ?>

            </div>
        </div>
    </nav>


    <div id="flash"><?= $_SESSION['flash']??'' ?></div>


    <div id="contenu">
        <?= $contenu ?>
    </div>


</div>
<footer id="footer" style="background: black">

    <p>Copyright © 2017 Jean Forteroche | Tous droits réservés |
        <a href="<?= "index.php?action=authentification" ?>">Espace Administrateur</a></p>


</footer>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>


</body>
</html>