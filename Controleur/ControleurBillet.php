<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurBillet {

    private $billet;
    private $commentaire;



    public function __construct() {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();


    }

    // Affiche les détails sur un billet
    public function billet($idBillet) {
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        //$reponses = $this->commentaire->getReponses($idBillet);
        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires,/* 'reponses' => $reponses */));
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet) {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        // Actualisation de l'affichage du billet
        // ajouter message flash
        header ('Location: index.php?action=billet&id=' . $idBillet);

    }
    //ajout Ben
    //répondre à un commentaire

    /*
    public function repondre($auteur, $contenu, $idBillet, $idCommentaire)
    {
        // Sauvegarde du commentaire
        $this->commentaire->repondreCommentaire($auteur, $contenu, $idBillet, $idCommentaire);
        // Actualisation de l'affichage du billet
        // ajouter message flash
        header('Location: index.php?action=billet&id=' . $idBillet);
    }
    */
}

