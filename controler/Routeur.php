<?php

require_once 'ControleurAccueil.php';
require_once 'ControleurBillet.php';
require_once 'ControleurCommentaire.php';
require_once 'ControleurUser.php';
require_once 'index.php'; // A vérifier !!!!!!!!!!!

class Routeur
{
    private $ctrlAccueil;
    private $ctrlBillet;
    private $ctrlCommentaire;
    private $ctrlUser;


    public function __construct()
    {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBillet = new ControleurBillet();
        $this->ctrlCommentaire = new ControleurCommentaire();
        $this->ctrlUser = new ControleurUser();
    }

// Route une requête entrante : exécution l'action associée
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'billet') {
                    $id = intval($this->getParametre($_GET, 'id'));
                    if ($id != 0) {
                        $this->ctrlBillet->billet($id);
                    } else
                        throw new Exception("Identifiant de billet non valide");
                } else if ($_GET['action'] == 'commenter') {
                    $pseudo = $this->getParametre($_POST, 'pseudo');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idParent = $this->getParametre($_POST, 'idParent');
                    $idBillet = $this->getParametre($_POST, 'idBillet');
                    $this->ctrlCommentaire->commenter($pseudo, $contenu, $idParent, $idBillet);
                } else
                    throw new Exception("Action non valide");
            } else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

}