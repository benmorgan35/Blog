<?php $this->titre = "Billet simple pour l'Alaska - Accueil"; ?>


<article>
    <header>

        <div class="row">
            <div class="col-xs-12">
                <h2 id="accueil">Accueil</h2> <hr />
                <p><b>Bienvenue sur le blog de Jean Forteroche.</b></p>
                <br/>
                <img src="assets/image/jean.jpg" alt="J Forteroche" id="auteur"/>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nunc lectus, mollis sed sem at,
                    tincidunt efficitur quam. Donec ut libero sodales ligula dapibus pellentesque. Aliquam at massa
                    feugiat, imperdiet ipsum dapibus, blandit purus. Etiam a consequat urna. Duis blandit diam non massa
                    auctor, sed suscipit mauris gravida. </p>
                <p>Donec ut diam metus. Vestibulum ut tellus efficitur mauris scelerisque consectetur et eget libero.
                    Duis scelerisque arcu facilisis libero semper, eget molestie ipsum blandit. </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nunc lectus, mollis sed sem at,
                    tincidunt efficitur quam. Donec ut libero sodales ligula dapibus pellentesque. Aliquam at massa
                    feugiat, imperdiet ipsum dapibus, blandit purus. Etiam a consequat urna. Duis blandit diam non massa
                    auctor, sed suscipit mauris gravida. </p>
                <p>Donec ut diam metus. Vestibulum ut tellus efficitur mauris scelerisque consectetur et eget libero.
                    Duis scelerisque arcu facilisis libero semper, eget molestie ipsum blandit. </p>
                <p id="signature">Jean Forteroche</p>
                <hr/>


                <div class='row'>
                    <h2 id="liste_episodes">Liste des épisodes</h2> <hr />
                    <table id="example" class="display" cellspacing="0" width="100%">


                        <thead>
                        <tr>
                            <th>Date de publication</th>
                            <th><h3>Episodes</h3></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($billets as $billet):?>
                            <tr>
                                <td>
                                    <time style="color:grey; font-size: 0.8em"><i><?= $billet['dateFR'] ?></i></time>
                                </td>
                                <td>
                                    <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                                        <p class="titreBillet"><?= $billet['titre'] ?><br />
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>
                    <br /><br /><br/>
                </div>


    </header>

</article>
<hr/>

