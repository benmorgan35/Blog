<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/User.php';

require_once 'Vue/Vue.php';

class ControleurSession
{

    private $_SESSION;

    public function __construct()
    {

        $this->$_SESSION = new $_SESSION();

    }

}