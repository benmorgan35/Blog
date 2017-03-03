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
// Affiche la page ajouterBillet
    public function ajouterBillet()
    {
        //$billets = $this->billet->getBillets();
        $vue = new Vue("ajouterBillet");
        $vue->generer(array());
    }

    // Ajoute un billet
    public function addBillet($titre, $contenu)
    {
        $this->billet->addBillet($titre, $contenu);
        header('Location: index.php?action=adminAccueil');
    }

    // Affiche la liste des commentaires et le nombre de commentaires signalés
    public function adminCommentaires(/*$idBillet*/)
    {
        //$billet = $this->billet->getBillet($idBillet);
        $nbSignalements = $this->commentaire->getNbSignalements();
        $adminCommentaires = $this->commentaire->getAdminCommentaires();
        $vue = new Vue("adminCommentaires");
        $vue->generer(array('adminCommentaires' => $adminCommentaires, 'nbSignalements' => $nbSignalements/*, 'billet' => $billet*/));
    }


    // Modifier un billet
    public function updateBillet()
    {
        //$billet = $this->billet->getBillet($idBillet);
        //$vue = new Vue("updateBillet");
        //$vue->generer(array('billet' => $billet));
    }
    // Supprimer un commentaire
    public function supprimerCommentaire($idCommentaire)
    {
        //$Commentaire = $this->commentaire->getCommentaire($idCommentaire);
        //$this->commentaire->deleteCommentaire($Commentaire);

    }

}
