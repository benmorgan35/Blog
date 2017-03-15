<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/User.php';

require_once 'Vue/Vue.php';

class ControleurAuthentification
{


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

    // Connecte un membre
    public function connexion($username, $password)
    {
        $user = $this->user->getUser($username, $password);

        if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
            if ($user) {
                if (isset($_SESSION['user'])) {
                    if (htmlspecialchars($_POST['username']) !== $_SESSION['user']['username']) {
                        $_SESSION['flash'] = 'Attention. Vous êtes sur la session de ' . htmlspecialchars($_SESSION['user']['prenom']) . '. Vous devez déconnecter Jean pour pouvoir vous connecter';
                        header('Location: index.php?action=accueil');
                    } else {
                        $_SESSION['flash'] = 'Rebonjour ' . htmlspecialchars($_SESSION['user']['prenom']) . '. Vous êtes déjà connecté.';
                        header('Location: index.php?action=adminAccueil');
                    }
                } else {
                    $_SESSION['user'] = $user;
                    $_SESSION['flash'] = 'Bonjour ' . htmlspecialchars($_SESSION['user']['prenom']) . '. Vous êtes désormais connecté';
                    header('Location: index.php?action=adminAccueil');
                }
            } else {
                $_SESSION['flash'] = 'Mauvais identifiants de connexion';
                header('Location: index.php?action=authentification');
            }
        } else {
            $_SESSION['flash'] = 'Veuillez renseigner tous les champs du formulaire.';
            header('Location: index.php?action=authentification');
        }
    }

    // Déconnecte et détruit la session
    public function deconnexion()
    {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: index.php?action=accueil');
    }


}


