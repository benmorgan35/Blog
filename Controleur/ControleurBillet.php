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
        //$commentaires = $this->commentaire->getCommentaires($idCommentaire);
        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet) {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        // Actualisation de l'affichage du billet
        // ajouter message flash
        header ('Location: index.php?action=billet&idB=' . $idBillet);

    }

    //répondre à un commentaire

    public function formulaireReponse($idBillet, $idCommentaire)
    {
        $billet = $this->billet->getBillet($idBillet);
        $commentaire = $this->commentaire->getCommentaires($idBillet);
        $this->commentaire->formulaireReponse($idBillet, $idCommentaire);
        $vue = new Vue("formulaireReponse");
        $vue->generer(array('billet' => $billet, 'commentaire' => $commentaire));
        header ('Location: index.php?action=billet&idB=' . $idBillet);
    }

    public function repondre($auteur, $contenu, $idBillet, $idCommentaire)
    {
        // Sauvegarde du commentaire
        $this->commentaire->repondreCommentaire($auteur, $contenu, $idBillet, $idCommentaire);
        // Actualisation de l'affichage du billet
        // ajouter message flash
        header ('Location: index.php?action=billet&idB=' . $idBillet);
    }//répondre à un commentaire


}

