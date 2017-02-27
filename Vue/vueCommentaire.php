<header>
    <h2 id="titreReponse">Répondre au commentaire </h2>

    <p><time style="color:grey"><i>Publié le <?= $commentaire['dateCrea'] ?></i></time>
    par <?= $commentaire['auteur'] ?>
    <p><?= $commentaire['contenu'] ?></p>

    <hr/>
</header>
<?php require 'formReponse.php'; ?>

