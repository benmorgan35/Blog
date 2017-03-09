<?php $this->titre = "Administrateur";

/*if(empty($_SESSION['username']))
{
// Si inexistante ou nulle, on redirige vers le formulaire de login
header('Location: index.php?action=accueil');
exit();
}*/
?>

    <header>
        <?php require 'menuAdmin.php'; ?>
        <br />
        <p> Bonjour <?php echo ($_SESSION['prenom']); ?> </p>

    </header>

    <div class="titre">
        <div class="row">
            <div class="col-xs-12">
                <h2 id="admin">Administration des épisodes</h2>
                <hr/>
            </div>
        </div>
    </div>

    <div class="page">

        <section>
            <div class="row">
                <div class="col-xs-12">
                    <h3>Ecrire un nouvel épisode
                        <a class="btn btn-primary" style="float: right; margin-right: 2%; width:90px;"
                           href="<?= "index.php?action=ajouterBillet" ?>">Valider</a></h3>
                </div>
            </div>
            <hr/>
        </section>
        <section>
            <div class='row'>
                <div class="col-xs-12">
                    <h3>Modifier ou supprimer un épisode existant</h3>
                    <br/>
                    <table class="table table-hover" cellspacing="0" width="100%">


                        <thead>
                        <tr>
                            <th>Date de publication</th>
                            <th>Episodes</th>
                            <th>Etat</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($adminBillets as $billet): ?>
                            <tr>
                                <td>
                                    <time style="color:grey; font-size: 0.8em"><i><?= $billet['dateCrea'] ?></i></time>
                                </td>
                                <td>
                                    <a href="<?= "index.php?action=billet&idB=" . $billet['idB'] ?>">
                                        <p class="titreBillet"><?= htmlspecialchars($billet['titre']) ?></p><br/>
                                    </a>
                                </td>
                                <td>
                                    <?php
                                    if ($billet['publication'] == 0){
                                        echo '<p style="color: green; font-style : italic; "> Brouillon';
                                        echo '</p>';
                                    }
                                    else if ($billet['publication'] == 1){
                                        echo '<p style="color: grey; font-style : italic; "> Publié';
                                        echo '</p>';
                                    }
                                     else if ($billet['publication'] == 2){
                                        echo '<p style="color: red; font-style : italic; "> Supprimé';
                                        echo '</p>';
                                    }
                                    ?>



                                </td>
                                <td>
                                    <a class="btn btn-primary" style="font-size: 14px; width: 90px;"
                                       href="<?= "index.php?action=modifierBillet&idB=" . $billet['idB'] ?>">Modifier</a>
                                </td>
                                <td>
                                    <?php if ($billet['publication'] != 2) {

                                    echo
                                    '<a class="btn btn-primary" style="font-size: 14px;width: 90px;"
                                       href="' . "index.php?action=deleteBillet&idB=" . $billet['idB'] . '">Supprimer'; echo '</a>'; } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>
                    <br/><br/><br/>
                </div>

                <hr/>

        </section>
    </div>