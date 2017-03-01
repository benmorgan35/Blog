<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';


class ControleurCommentaire
{

    private $billet;
    private $commentaire;


    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }


    // Affiche les détails d'un commentaire
    public function commentaire($idCommentaire)
    {
        $commentaire = $this->commentaire->getCommentaire($idCommentaire);
        $vue = new Vue("Commentaire");
        $vue->generer(array('commentaire' => $commentaire));
    }


    //répondre à un commentaire
    public function repondre($auteur, $contenu, $idBillet, $idCommentaire, $idParent)
    {
        // Sauvegarde du commentaire
        $this->commentaire->repondreCommentaire($auteur, $contenu, $idBillet, $idCommentaire, $idParent);
        // Actualisation de l'affichage du billet
        // ajouter message flash
        header ('Location: index.php?action=billet&idB=' . $idBillet);
    }

}
