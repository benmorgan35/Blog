<div class="container-fluid">
    <div class="contenu">

        <div class="row">

            <div class="col-lg-12">
                <h2>Accueil</h2>
                <p><b>Bienvenue sur le blog de Jean Forteroche, acteur écrivain</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam maximus pulvinar odio et volutpat.
                    Curabitur quis efficitur felis. Donec id tristique lectus, mattis imperdiet augue. Cras vel quam in
                    arcu
                    posuere
                    consectetur. Donec feugiat, dui venenatis mattis pellentesque, mi orci pharetra libero, id
                    consectetur
                    mi massa et odio. </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam maximus pulvinar odio et volutpat.
                    Curabitur quis efficitur felis. Donec id tristique lectus, mattis imperdiet augue. Cras vel quam in
                    arcu
                    posuere
                    consectetur. Donec feugiat, dui venenatis mattis pellentesque, mi orci pharetra libero, id
                    consectetur
                    mi massa et odio. </p>
            </div>

        </div>


        <div class="row">
            <div class="col-xs-12">

                <?php ob_start() ?>
                <form action="" method="post">
                    <table id="tableau" class="table table-bordered">
                        <caption><b>Liste des épisodes</b></caption>
                        <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Date</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $billets = $manager->getList('');
                        if (empty($billets)) {
                            echo '<tr><td>Aucun épisode publié</td></tr>';
                        } else {
                            foreach ($billets as $unBillet) {
                                echo '<tr><td>' . $unBillet->getTitre() . '</td><td>' . $unBillet->getDateCrea() . '</td></tr>';
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </form>
                <?php $content = ob_get_clean() ?>
            </div>
        </div>
    </div>
</div>





