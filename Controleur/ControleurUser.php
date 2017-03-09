<?php
//session_start()

require_once 'Modele/User.php';
require_once 'Vue/Vue.php';

class ControleurUser
{

    private $user;

// Déclarations des constantes en rapport avec la force.

    //const CONNECT = 1;
    //const DECONNECT = 2;

    public function __construct()
    {
        $this->user = new User();
    }

    // Affiche la liste des membres
    public function users()
    {
        $users = $this->user->getusers();
        $vue = new Vue("Membres");
        $vue->generer(array('users' => $users));
    }

    //Inscrire un membre
    public function inscription($prenom, $nom, $username, $password /*$password_hashe*/)
    {
        $this->user->inscription($prenom, $nom, $username, $password /*$password_hashe*/);

        header ('Location: index.php?action=membres');
    }




    // désinscrire un membre
    public function deleteUser($idUser)
    {
        $this->user->deleteUser($idUser);
        $users = $this->user->getUsers();
        $vue = new Vue("Membres");
        $vue->generer(array('users' => $users));
    }


}
