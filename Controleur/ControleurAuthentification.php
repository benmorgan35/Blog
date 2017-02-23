<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/User.php';

require_once 'Vue/Vue.php';

class ControleurAuthentification
{

    private $username;
    private $password;

    public function __construct()
    {
        $this->user = new User();
    }


    public function authentification()
    {
        $vue = new Vue("Authentification");
        $vue->generer(array());
    }

    public function connexion($username, $password)
    {
        $user = $this->user->getUser($username, $password);
        //var_dump($user);
        //$this->getFlash('Bonjour' . $username .  '.Vous êtes maintenant connecté');
        header ('Location: index.php');

    }

    public function deconnexion()
    {
        //$user->connexion = false;
        //unset($_SESSION['user']);
        //$this->$Session->setFlash(__('Vous êtes maintenant déconnecté');
        //header ('Location: index.php');
    }


    public function register()
    {

    }


}


