<?php

require_once 'ControleurAccueil.php';
require_once 'ControleurBillet.php';
require_once 'ControleurAuthentification.php';
require_once 'ControleurCommentaire.php';
require_once 'ControleurAdmin.php';
require_once 'ControleurUser.php';


require_once 'Vue/Vue.php';

class Routeur
{

    private $ctrlAccueil;
    private $ctrlBillet;
    private $ctrlAuth;
    private $ctrlCommentaire;
    private $ctrlAdmin;
    private $ctrlUser;


    public function __construct()
    {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBillet = new ControleurBillet();
        $this->ctrlAuth = new ControleurAuthentification();
        $this->ctrlCommentaire = new ControleurCommentaire();
        $this->ctrlAdmin = new ControleurAdmin();
        $this->ctrlUser = new ControleurUser();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {


                switch ($_GET['action']) {


                //===================================================================================
                // I. ACTIONS TOUT UTILISATEUR
                //===================================================================================


                    //-------------------------------------------------
                    // I.1. Affichage des pages tout public
                    //-------------------------------------------------


                    //Afficher la page d'accueil
                    case 'accueil':
                        $this->ctrlAccueil->accueil();
                        break;

                    // Afficher de la page d'un commentaire avec formulaire
                    case 'commentaire' :
                        $idCommentaire = intval($this->getParametre($_GET, 'idC'));
                        if ($idCommentaire != 0) {
                            $this->ctrlCommentaire->commentaire($idCommentaire);
                        } else
                            throw new Exception("Identifiant de commentaire non valide");
                        break;

                    //Afficher la page d'un billet détaillé
                    case 'billet' :
                        $idBillet = intval($this->getParametre($_GET, 'idB'));
                        if ($idBillet != 0) {
                            $this->ctrlBillet->billet($idBillet);
                        } else
                            throw new Exception("Identifiant de billet non valide");
                        break;

                     // Afficher la page d'authentification
                    case 'authentification' :
                        $this->ctrlAuth->authentification();
                        break;


                    //-------------------------------------------------
                    // I.2. Actions sur un billet
                    //-------------------------------------------------


                    // Commenter un billet
                    case 'commenter' :
                        $auteur = $this->getParametre($_POST, 'auteur');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $idBillet = $this->getParametre($_POST, 'idB');
                        $this->ctrlCommentaire->commenter($auteur, $contenu, $idBillet);
                        break;


                    //-------------------------------------------------
                    // I.3. Action sur un commentaire
                    //-------------------------------------------------


                    // Répondre à un commentaire
                    case 'repondre' :
                        $auteur = $this->getParametre($_POST, 'auteur');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $idBillet = $this->getParametre($_POST, 'idB');
                        $idCommentaire = $this->getParametre($_POST, 'idC');
                        $this->ctrlCommentaire->repondre($auteur, $contenu, $idBillet, $idCommentaire);
                        break;

                    // Signaler un commentaire
                    case 'signalerCommentaire' :
                        $this->ctrlCommentaire->signalerCommentaire($this->getParametre($_GET, 'idC'));
                        break;


                 //===================================================================================
                 // II. ACTIONS DE L'ADMINISTRATEUR
                 //===================================================================================


                    //-------------------------------------------------
                    // II.1. Affichage des pages Admin
                    //-------------------------------------------------


                    // Afficher la page accueil de l'admin
                    case 'adminAccueil' :
                        $this->ctrlAdmin->adminAccueil();
                        break;

                    // Affiche la page Admin Commentaires
                    case 'adminCommentaires':
                        $this->ctrlAdmin->adminCommentaires(/*$idBillet*/);

                        break;

                    // Afficher la page modifier Billet avec le billet à modifier
                    case 'modifierBillet':
                        $idBillet = intval($this->getParametre($_GET, 'idB'));
                        if ($idBillet != 0) {
                            $this->ctrlAdmin->modifierBillet($idBillet);
                        }
                        else {
                            throw new Exception("Identifiant d'épisode non valide");
                        }
                        break;

                    // Affiche la page Membres
                    case 'membres' :
                        $this->ctrlUser->users();
                        break;

                    // Affiche la page pour ajouter un billet
                    case 'ajouterBillet':
                        $this->ctrlAdmin->ajouterBillet();
                        break;


                    //-------------------------------------------------
                    // II.2. Connexions / Membres
                    //-------------------------------------------------


                    // Se connecter
                    case 'connexion' :
                        $username = $this->getParametre($_POST, 'username');
                        $password = $this->getParametre($_POST, 'password');
                        $this->ctrlAuth->connexion($username, $password);
                        break;

                    // Se déconnecter
                    case 'deconnexion' :
                        $this->ctrlAuth->deconnexion();
                        break;

                    // Inscrire un nouveau membre
                    case 'inscription' :
                        $prenom = $this->getParametre($_POST, 'prenom');
                        $nom = $this->getParametre($_POST, 'nom');
                        $username = $this->getParametre($_POST, 'username');
                        $password = $this->getParametre($_POST, 'password');
                        $this->ctrlUser->inscription($prenom, $nom, $username, $password);
                        break;

                    // Supprimer un membre
                    case 'deleteUser' :
                        $this->ctrlUser->deleteUser($this->getParametre($_GET, 'idU'));
                        break;


                    //-------------------------------------------------
                    // II.3. Actions admin sur un billet
                    //-------------------------------------------------


                    // Ajouter un billet
                    case 'addBillet' :
                        $titre = $this->getParametre($_POST, 'titre');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $action = $this->getParametre($_POST, 'action');
                        $this->ctrlAdmin->addBillet($titre, $contenu, $action);
                        break;

                    // Modifier un billet, avec action au choix : le publier ou l'enregistrer comme brouillon
                    case 'updateBillet' :

                        $idBillet = intval($this->getParametre($_GET, 'idB'));
                        $titre = $this->getParametre($_POST, 'titre');
                        $contenu = $this->getParametre($_POST, 'contenu');
                        $action = $this->getParametre($_POST, 'action');
                        $this->ctrlAdmin->updateBillet($idBillet, $titre, $contenu, $action);
                        break;

                    // Supprimer un billet
                    case 'deleteBillet' :
                        $this->ctrlAdmin->deleteBillet($this->getParametre($_GET, 'idB'));
                        break;

                    //-------------------------------------------------
                    // II.4. Actions admin sur un commentaire
                    //-------------------------------------------------


                    // Annuler un signalement
                    case 'annulerSignalement' :
                        $this->ctrlAdmin->annulerSignalement($this->getParametre($_GET, 'idC'));
                        break;

                    // Supprimer un commentaire
                    case 'supprimerCommentaire' :
                        $this->ctrlAdmin->deleteCommentaire($this->getParametre($_GET, 'idC'));
                        break;

                    default :
                        throw new Exception("Désolé, action non valide");


                } // fin du switch

            } // fin du (isset($_GET['action']))

            else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }


        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur)
    {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else
            throw new Exception("Paramètre '$nom' absent");
    }

}
