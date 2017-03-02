<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';

require_once 'Vue/Vue.php';


class ControleurAdmin
{

    private $billet;
    private $commentaire;

    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new commentaire();
    }

    // Affiche la liste de tuos les billets
    public function AdminAccueil()
    {
        $billets = $this->billet->getBillets();
        $vue = new Vue("AdminAccueil");
        $vue->generer(array('billets' => $billets));
    }


    // Affiche la page addBillet
    public function addBillet()
    {
        $billets = $this->billet->getBillets();
        $vue = new Vue("addBillet");
        $vue->generer(array('billets' => $billets));
    }

    // Affiche la liste des commentaires
    public function adminCommentaires()
    {

        $adminCommentaires = $this->commentaire->getAdminCommentaires();
        $vue = new Vue("adminCommentaires");
        $vue->generer(array('adminCommentaires' => $adminCommentaires));
    }

    // Modifier un billet
    public function updateBillet($idBillet)
    {
        $billet = $this->billet->getBillet($idBillet);
        $vue = new Vue("updateBillet");
        $vue->generer(array('billet' => $billet));
    }

}
