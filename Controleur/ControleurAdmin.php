<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';

require_once 'Vue/Vue.php';


class ControleurAdmin
{

    private $billet;
    private $commentaire;
    private $user;


    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
        $this->user = new User();
    }


    //===================================================================================
    // AFFICHAGE DES PAGES ADMIN
    //===================================================================================


    // Affiche la page d'accueil Admin avec la liste de tous les billets publiés, brpuillon, supprimés
    public function adminAccueil()
    {
        if (isset($_SESSION['user'])) {
            $adminBillets = $this->billet->getAdminBillets();
            $vue = new Vue("AdminAccueil");
            $vue->generer(array('adminBillets' => $adminBillets));
        }
        else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisés à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }


    // Affiche la page ajouterBillet
    public function ajouterBillet()
    {
        if (isset($_SESSION['user'])) {
            $vue = new Vue("AjouterBillet");
            $vue->generer(array());
        }
        else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }


    // Affiche la page modifierBillet
    /**
     * @param int $idBillet
     */
    public function modifierBillet($idBillet)
    {
        if (isset($_SESSION['user'])) {
            $billet = $this->billet->getBillet($idBillet);
            $vue = new Vue("ModifierBillet");
            $vue->generer(array('billet' => $billet));
        }
        else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }


    // Affiche la liste des commentaires et le nombre de commentaires signalés
    public function adminCommentaires()
    {
        if (isset($_SESSION['user'])) {
            $nbSignalements = $this->commentaire->getNbSignalements();
            $adminCommentaires = $this->commentaire->getAdminCommentaires();
            $vue = new Vue("AdminCommentaires");
            $vue->generer(array('adminCommentaires' => $adminCommentaires, 'nbSignalements' => $nbSignalements));
        }
        else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }


    //===================================================================================
    // ACTIONS ADMIN SUR UN BILLET
    //===================================================================================

    // Ajouter un billet
    /**
     * @param string $titre
     * @param string $ontenu
     * @param string $action
     */
    public function addBillet($titre, $contenu, $action)
    {

        if (!empty($titre) && !empty($contenu)) {
            if (isset($_SESSION['user'])) {
                if ($action == 'brouillon') {
                    $this->billet->brouillonBillet($titre, $contenu);
                    $_SESSION['flash'] = 'Votre billet est sauvegardé en brouillon.';
                    header('Location: index.php?action=adminAccueil');
                } else if ($action == 'publier') {
                    $this->billet->publierBillet($titre, $contenu);
                    $_SESSION['flash'] = 'Votre billet est publié.';
                    header('Location: index.php?action=adminAccueil');
                }
            }
            else {
                $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
                header('Location: index.php?action=accueil');
            }
        }
        else {
            $_SESSION['flash'] = 'Veuillez renseigner tous les champs du formulaire.';
            header('Location: index.php?action=ajouterBillet');
        }


    }

    // Modifier un billet
    /**
     * @param int $idBillet
     * @param string $titre
     * @param string $contenu
     * @param string $action
     */
    public function updateBillet($idBillet, $titre, $contenu, $action)
    {

        if (!empty($titre) && !empty($contenu)) {
            if (isset($_SESSION['user'])) {
                if ($action == 'brouillonModif') {
                    $this->billet->brouillonUpdate($idBillet, $titre, $contenu);
                    $_SESSION['flash'] = 'Vos modifications sont sauvegardées en brouillon.';
                    header('Location: index.php?action=adminAccueil');
                } else if ($action == 'publierModif') {
                    $this->billet->publierUpdate($idBillet, $titre, $contenu);
                    $_SESSION['flash'] = 'Votre billet modifié est publié.';
                    header('Location: index.php?action=adminAccueil');
                }
            } else {
                $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
                header('Location: index.php?action=accueil');
            }
        }
        else {
            $_SESSION['flash'] = 'Veuillez renseigner tous les champs du formulaire.';
            header('Location: index.php?action=modifierBillet&idB=' . $idBillet);
        }

    }


    // supprimer un billet
    /**
     * @param int $idBillet
     */
    public function deleteBillet($idBillet)
    {
        if (isset($_SESSION['user'])) {
            $this->billet->deleteBillet($idBillet);
            $adminBillets = $this->billet->getAdminBillets();
            $_SESSION['flash'] = 'L\'épisode n\'est plus publié. Vous pouvez néamoins toujours le retrouver sur cette page dans la liste des épisodes.';
            $vue = new Vue("AdminAccueil");
            $vue->generer(array('adminBillets' => $adminBillets));
        }
        else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }


    //===================================================================================
    // ACTIONS ADMIN SUR UN COMMENTAIRE
    //===================================================================================


    // Supprimer un commentaire
    /**
     * @param int $idCommentaire
     */
    public function deleteCommentaire($idCommentaire)
    {
        if (isset($_SESSION['user'])) {
            $this->commentaire->deleteCommentaire($idCommentaire);
            $this->commentaire->annulerSignalement($idCommentaire);
            $nbSignalements = $this->commentaire->getNbSignalements();
            $adminCommentaires = $this->commentaire->getAdminCommentaires();
            $_SESSION['flash'] = 'Le commentaire est supprimé.';
            $vue = new Vue("AdminCommentaires");
            $vue->generer(array('adminCommentaires' => $adminCommentaires, 'nbSignalements' => $nbSignalements));
        }
        else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }


    // Annuler un signalement
    /**
     * @param int $idCommentaire
     */
    public function annulerSignalement($idCommentaire)
    {
        if (isset($_SESSION['user'])) {
            $this->commentaire->annulerSignalement($idCommentaire);
            $nbSignalements = $this->commentaire->getNbSignalements();
            $adminCommentaires = $this->commentaire->getAdminCommentaires();
            $_SESSION['flash'] = 'Le commentaire n\'est plus signalé.';
            $vue = new Vue("AdminCommentaires");
            $vue->generer(array('adminCommentaires' => $adminCommentaires, 'nbSignalements' => $nbSignalements));
        }
        else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }


}
