<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/authentification.php';
require_once 'Vue/Vue.php';

class ControleurAuthentification
{

    private $username;
    private $password;

    public function __construct()
    {
        $this->user = new User();
    }

}


