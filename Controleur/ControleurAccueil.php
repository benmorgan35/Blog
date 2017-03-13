<?php

require_once 'Modele/Billet.php';
require_once 'Vue/Vue.php';

class ControleurAccueil
{

    private $billet;

    public function __construct()
    {
        $this->billet = new Billet();
    }

    // Affiche la liste des billets publiés
    public function accueil()
    {
        $billets = $this->billet->getBillets();
        $vue = new Vue("Accueil");
        $vue->generer(array('billets' => $billets));
    }

}

