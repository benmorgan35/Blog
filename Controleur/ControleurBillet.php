<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';


class ControleurBillet
{

    private $billet;
    private $commentaire;





    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();


    }

    // Affiche les détails sur un billet
    public function billet($idBillet)
    {
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        $reponsesCommentaire = $this->commentaire->getCommentairesChilds($idBillet);
        $reponsesReponse = $this->commentaire->getReponsesChilds($idBillet);
        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires, 'reponsesCommentaire' => $reponsesCommentaire, 'reponsesReponse' => $reponsesReponse));
    }

    //affiche les détails d'un commentaire sur une nouvelle vue
    public function commentaire($idCommentaire)
    {
        $commentaire = $this->commentaire->getCommentaire($idCommentaire);
        $vue = new Vue("Commentaire");
        $vue->generer(array('commentaire' => $commentaire));
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet)
    {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        // Actualisation de l'affichage du billet
        // ajouter message flash
        header('Location: index.php?action=billet&idB=' . $idBillet);

    }



    //répondre à un commentaire
    public function repondre($auteur, $contenu, $idBillet, $idCommentaire)
    {
        // Sauvegarde du commentaire
        $this->commentaire->repondreCommentaire($auteur, $contenu, $idBillet, $idCommentaire);
        // Actualisation de l'affichage du billet
        // ajouter message flash
        header('Location: index.php?action=billet&idB=' . $idBillet);
    }


}

