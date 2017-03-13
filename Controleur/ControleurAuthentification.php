<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/User.php';

require_once 'Vue/Vue.php';

class ControleurAuthentification
{

    private $prenom;
    private $username;
    private $password;

    public function __construct()
    {
        $this->user = new User();
    }

    // Affiche la page d'authentification
    public function authentification()
    {
        $vue = new Vue("Authentification");
        $vue->generer(array());
    }

    public function connexion($username)
    {
        $user = $this->user->getUser($username);
        if (isset($_SESSION['user']))  {
            $_SESSION['flash'] = htmlspecialchars($_SESSION['user']['prenom']). ' est déjà connecté.';
            header('Location: index.php?action=adminAccueil');
        }
        else {
            if ($user) {
               $_SESSION['user']=$user;
               $_SESSION['flash'] = 'Bonjour ' .htmlspecialchars($_SESSION['user']['prenom']) . '. Vous êtes désormais connecté';
               header('Location: index.php?action=adminAccueil');
            }
            else
            {
                $_SESSION['flash'] = 'Mauvais identifiants de connexion';
                header('Location: index.php?action=authentification');
            }
        }


    }


    public function deconnexion()
    {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: index.php?action=accueil');

    }



}


