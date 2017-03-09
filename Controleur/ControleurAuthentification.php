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

    // Déclarations des constantes en rapport avec la force.

    const CONNECT = 1;
    const DECONNECT = 2;


    public function __construct()
    {
        $this->user = new User(User::DECONNECT);
    }

    // Affiche la page d'authentification
    public function authentification()
    {
        $vue = new Vue("Authentification");
        $vue->generer(array());
    }

    public function connexion($username, $password)
    {

            $user = $this->user->getUser($username, $password);
            //$this->getFlash('Bonjour' . $username .  '.Vous êtes maintenant connecté');


            /*

            if (isset($_POST['username']) && isset($_POST['password'])) {
                if ($username == $_POST['username'] AND $password == $_POST['password']) {
                    session_start();
                    // Enregistrement des variables en session
                    $_SESSION['id'] = $_POST['id'];
                    $_SESSION['prenom'] = $_POST['prenom'];
                    $_SESSION['nom'] = $_POST['nom'];
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['password'] = $_POST['password'];
                    header('Location: index.php?action=adminAccueil');
                }
                else {
                    throw new Exception("Identifiants non valides");
                }

            }
            else {  // aucune action définie : affichage de l'accueil
                header('Location: index.php?action=authentification');
            }

            */

        header ('Location: index.php?action=adminAccueil');


    }


    public function deconnexion()
    {
        //$this->$Session->setFlash(__('Vous êtes maintenant déconnecté');
        // On réécrit le tableau
        $_SESSION = array();

        //ou session_unset ();
        // On détruit notre session
        session_destroy();
        // On redirige le visiteur vers la page d'accueil
        unset($_SESSION);
        header('location: index.php');
    }



}


