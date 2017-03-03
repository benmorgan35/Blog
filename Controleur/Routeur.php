<?php

require_once 'ControleurAccueil.php';
require_once 'ControleurBillet.php';
require_once 'ControleurAuthentification.php';
require_once 'ControleurCommentaire.php';
require_once 'ControleurAdmin.php';

require_once 'Vue/Vue.php';

class Routeur {

    private $ctrlAccueil;
    private $ctrlBillet;
    private $ctrlAuth;
    private $ctrlCommentaire;
    private $ctrlAdmin;

    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBillet = new ControleurBillet();
        $this->ctrlAuth = new ControleurAuthentification();
        $this->ctrlCommentaire = new ControleurCommentaire();
        $this->ctrlAdmin = new ControleurAdmin();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'billet') {
                    $idBillet = intval($this->getParametre($_GET, 'idB'));
                    if ($idBillet != 0) {
                        $this->ctrlBillet->billet($idBillet);
                        //$this->ctrlCommentaire->commentaire($idCommentaire);
                    }
                    else
                        throw new Exception("Identifiant de billet non valide");
                }
                else if ($_GET['action'] == 'adminAccueil') {
                    $this->ctrlAdmin->adminAccueil();
                }
                else if ($_GET['action'] == 'adminCommentaires') {
                    //$idBillet = intval($this->getParametre($_GET, 'idB'));
                    $this->ctrlAdmin->adminCommentaires(/*$idBillet*/);
                }
                else if ($_GET['action'] == 'ajouterBillet') {
                    $this->ctrlAdmin->ajouterBillet();

                } else if ($_GET['action'] == 'addBillet') {
                    $titre = $this->getParametre($_POST, 'titre');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $this->ctrlAdmin->addBillet($titre, $contenu);
                }
                else if ($_GET['action'] == 'updateBillet') {
                    //$idBillet = intval($this->getParametre($_GET, 'idB'));
                    //$titre = intval($this->getParametre($_GET, 'titre'));
                    //$contenu = intval($this->getParametre($_GET, 'contenu'));
                    //$this->ctrlAdmin->updateBillet($idBillet/*, $titre, $contenu*/);
                }
                else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idBillet = $this->getParametre($_POST, 'idB');
                    $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
                }
                else if ($_GET['action'] == 'commentaire') {
                    //$idBillet = intval($this->getParametre($_GET, 'idB'));
                    $idCommentaire = intval($this->getParametre($_GET, 'idC'));

                    if ($idCommentaire != 0) {
                        $this->ctrlCommentaire->commentaire($idCommentaire);
                    }
                    else
                        throw new Exception("Identifiant de commentaire non valide");
                }
                else if($_GET['action'] == 'repondre') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idBillet = $this->getParametre($_POST, 'idB');
                    $idCommentaire = $this->getParametre($_POST, 'idC');

                    $this->ctrlCommentaire->repondre($auteur, $contenu, $idBillet, $idCommentaire);
                }
                else if ($_GET['action'] == 'authentification') {
                $this->ctrlAuth->authentification();
                }
                else if ($_GET['action'] == 'connexion'){
                    $username = $this->getParametre($_POST, 'username');
                    $password = $this->getParametre($_POST, 'password');
                   $this->ctrlAuth->connexion($username, $password);
                }
                else if ($_GET['action'] == 'deconnexion'){
                   //$this->ctrlAuth->deconnexion();
                }
                else if ($_GET['action'] == 'signalerCommentaire'){
                    $this->ctrlCommentaire->signalerCommentaire();
                }
                else if ($_GET['action'] == 'supprimerCommentaire'){
                    //$idCommentaire = intval($this->getParametre($_GET, 'idC'));
                    //$this->ctrlAdmin->supprimerCommentaire($idCommentaire);
                }

                else
                    throw new Exception("Action non valide");
            }
            else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }

            if (isset($_GET['user'])) {
            }

        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}
