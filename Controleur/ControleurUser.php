<?php
//session_start()

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/User.php';
require_once 'Vue/Vue.php';

class ControleurUser
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
        //$this->$Session->setFlash(__('Bonjour Jean, vous êtes maintenant connecté');
        header ('Location: index.php?action=billet&idBillet=' . $idBillet);
    }

    public function deconnexion()
    {
            //session_destroy();
            //header('Location: index.php');
    }


    public function register()
    {

    }

    // fonction deconnexion

}
