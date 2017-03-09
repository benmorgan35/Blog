<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
//require_once 'Modele/user.php';

require_once 'Vue/Vue.php';


class ControleurAdmin
{

    private $billet;
    private $commentaire;

    //private $user;

    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new commentaire();
        $this->user = new user();
    }



    //===================================================================================
    // AFFICHAGE DES PAGES ADMIN
    //===================================================================================


    // Affiche la page d'accueil Admin avec la liste de tous les billets publiés, brpuillon, supprimés
    public function AdminAccueil()
    {
        $adminBillets = $this->billet->getAdminBillets();
        $vue = new Vue("AdminAccueil");
        $vue->generer(array('adminBillets' => $adminBillets));
    }

    // Affiche la page ajouterBillet
    public function ajouterBillet()
    {
        //$billets = $this->billet->getBillets();
        $vue = new Vue("ajouterBillet");
        $vue->generer(array());
    }

    // Affiche la page modifierBillet
    public function modifierBillet($idBillet)
    {
        $billet = $this->billet->getBillet($idBillet);
        $vue = new Vue("modifierBillet");
        $vue->generer(array('billet' => $billet));
    }

    // Affiche la liste des commentaires et le nombre de commentaires signalés
    public function adminCommentaires()
    {
        $nbSignalements = $this->commentaire->getNbSignalements();
        $adminCommentaires = $this->commentaire->getAdminCommentaires();
        $vue = new Vue("adminCommentaires");
        $vue->generer(array('adminCommentaires' => $adminCommentaires, 'nbSignalements' => $nbSignalements));
    }



    //===================================================================================
    // ACTIONS ADMIN SUR UN BILLET
    //===================================================================================


    // Enregistrer un billet en brouillon
    public function brouillonBillet($titre, $contenu)
    {
        $this->billet->brouillonBillet($titre, $contenu);
        header('Location: index.php?action=adminAccueil');
    }

    // Publier un billet

    public function publierBillet($titre, $contenu)
    {
        $this->billet->publierBillet($titre, $contenu);
        header('Location: index.php?action=adminAccueil');
    }



    // Modifier un billet et l'enregistrer en tant que brouillon
    public function brouillonUpdate($idBillet, $titre, $contenu)
    {
        $this->billet->updateBrouillonBillet($idBillet, $titre, $contenu);
        $adminBillets = $this->billet->getAdminBillets();
        $vue = new Vue("AdminAccueil");
        $vue->generer(array('adminBillets' => $adminBillets));
    }

    // Modifier un billet et le publier
    public function publierUpdate($idBillet, $titre, $contenu)
    {

        $this->billet->updatePublierBillet($idBillet, $titre, $contenu);
        $adminBillets = $this->billet->getAdminBillets();
        $vue = new Vue("AdminAccueil");
        $vue->generer(array('adminBillets' => $adminBillets));
    }



    public function deleteBillet($idBillet)
    {
        $this->billet->deleteBillet($idBillet);
        $adminBillets = $this->billet->getAdminBillets();
        $vue = new Vue("AdminAccueil");
        $vue->generer(array('adminBillets' => $adminBillets));
    }



    //===================================================================================
    // ACTIONS ADMIN SUR UN COMMENTAIRE
    //===================================================================================


    // Supprimer un commentaire
    public function deleteCommentaire($idCommentaire)
    {
        $this->commentaire->deleteCommentaire($idCommentaire);
        $this->commentaire->annulerSignalement($idCommentaire);
        $nbSignalements = $this->commentaire->getNbSignalements();
        $adminCommentaires = $this->commentaire->getAdminCommentaires();
        $vue = new Vue("adminCommentaires");
        $vue->generer(array('adminCommentaires' => $adminCommentaires, 'nbSignalements' => $nbSignalements));
    }

    // Annuler un signalement
    public function annulerSignalement($idCommentaire)
    {
        $this->commentaire->annulerSignalement($idCommentaire);
        $nbSignalements = $this->commentaire->getNbSignalements();
        $adminCommentaires = $this->commentaire->getAdminCommentaires();
        $vue = new Vue("adminCommentaires");
        $vue->generer(array('adminCommentaires' => $adminCommentaires, 'nbSignalements' => $nbSignalements));
    }



    //===================================================================================
    // VOIR AVEC SEB
    //===================================================================================



    //Affiche la page du billet d'un commentaire'
    public function billetCom($idCommentaire, $idBillet)
    {
       // $billet = $this->billet->getBilletCom($idCommentaire);
        //$commentaires = $this->commentaire->getCommentaires($idBillet);
      //  $vue = new Vue("Billet");
        //$vue->generer(array('billet' => $billet, 'commentaires' => $commentaires, "commentaireModele" => $this -> commentaire));
    }



}
