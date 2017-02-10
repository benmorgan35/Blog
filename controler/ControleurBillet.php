<?php

require_once 'Modele/Billet.class.php';
require_once 'Modele/BilletsManager.class.php';
require_once 'Modele/Commentaire.class.php';
require_once 'Vue/Billet.php';
require_once 'index.php';
require_once 'modele/connexion.php';

class ControleurBillet {

    private $billet;
    private $commentaire;

    public function __construct() {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un billet
    public function billet($id) {
        $billet = $this->billet->getBillet($id);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        require 'vue/Billet.php';
    }
}





if (isset($_POST['creer']) && isset($_POST['dateCrea']) && isset($_POST['titre']) && isset($_POST['contenu'])) // Si on a voulu enregistrer un billet.
{
    $titre = $_POST['titre'];
    $dateCrea = $_POST['dateCrea'];
    $contenu = $_POST['contenu'];

    $billet = new Billet(['id' => 2, 'titre' => $titre, 'dateCrea' => $dateCrea, 'contenu' => $contenu]); // On ajoute un nouveau billet.

    if (!$billet->titreValide()) {
        $message = ' Le titre est invalide.';
        unset($billet);
    } elseif ($manager->exists($billet->getTitre())) {
        $message = 'Ce billet est déjà enregistré.';
        unset($billet);
    } else {
        $manager->add($billet);
    }

}

?>