<section>
    <div class="titre">
        <div class="row">
            <div class="col-xs-12">
                <h2>Répondre à un commentaire</h2>
                <hr/>

            </div>
        </div>
    </div>
</section>

<div class="page">

    <section>
        <div class="row">
            <h3 id="titreReponse">Commentaire </h3>

            <p>
                <time style="color:grey"><i>Publié le <?= $commentaire['dateCrea'] ?></i></time>
                par <?= htmlspecialchars($commentaire['auteur']) ?>
            <p><?= htmlspecialchars($commentaire['contenu']) ?></p>

            <hr/>
            <h3 id="titreReponse">Votre réponse </h3>
            <br/>
            <?php require 'formReponse.php'; ?>
        </div>
    </section>
    <br/><br/>
</div>

