<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>

    <title><?= $titre ?></title>
</head>
<body>

<div class="container-fluid">
    <div class="page">

    <header>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="navbar-header">
                <a class="navbar-brand"><b>Blog de Jean Forteroche</b></a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Accueil</a></li>
                <li><a href="index.php#liste_episodes">Liste des épisodes</a></li>
            </ul>
        </nav>


        <div class="row">
            <div class="col-xs-12">
                <img src="assets/image/header.jpg" alt="image header" class="img-responsive" id="header"/>

            </div>
        </div>

        <div class="row" id="texte">
            <h1 id="titreBlog">Billet simple pour l'Alaska</h1>
            <p>Roman en ligne</p>
            <hr/>

    </header>

    <div id="contenu">
        <?= $contenu ?>
    </div> <!-- #contenu -->
    </div>
    <br />
    <br />
    <br />

    <footer id="footer">
        <div class="row">
            <div class="col-lg-12" id="footer">
                <p>Copyright © 2017 Jean Forteroche | Tous droits réservés |
                    <a href="vueAuthentification.php">Administrateur</a>
            </div>
        </div>

    </footer>
</div>
<!-- #global -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            scrollY:        '50vh',
            scrollCollapse: true,
            paging:         false
        } );
    } );




</script>


</body>
</html>