<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';

require_once 'Vue/Vue.php';


class ControleurAdmin
{

    private $billet;

    public function __construct()
    {
        $this->billet = new Billet();
    }


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

}
