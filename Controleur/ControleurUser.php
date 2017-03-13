<?php
//session_start()

require_once 'Modele/User.php';
require_once 'Vue/Vue.php';

class ControleurUser
{

    private $user;

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
    public function inscription($prenom, $nom, $username, $password)
    {
        if (isset($_SESSION['user'])) {
            $this->user->inscription($prenom, $nom, $username, $password);
            header ('Location: index.php?action=membres');
            $_SESSION['flash'] = 'Un nouveau membre vient d\'être enregistré.';
        }
        else{
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }

    // désinscrire un membre
    public function deleteUser($idUser)
    {
        if (isset($_SESSION['user'])) {
            $this->user->deleteUser($idUser);
            $users = $this->user->getUsers();
            $vue = new Vue("Membres");
            $vue->generer(array('users' => $users));
            $_SESSION['flash'] = 'Un membre vient d\être supprimé.';
        }
        else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }

    }


}
