<?php

require_once 'modele/BilletsManager.class.php';
require_once 'modele/Billet.class.php';
require_once 'modele/connexion.php';




class ControleurAccueil {

    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }

    // Affiche la liste de tous les billets du blog
    public function accueil() {
        $billets = $this->billet->getList();
        require_once 'vue/Accueil.php';
    }
}