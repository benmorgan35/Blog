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
    /**
     * @param string $prenom
     * @param string $nom
     * @param string $username
     * @param string $password
     */
    public function inscription($prenom, $nom, $username, $password)
    {

        if (!empty($username) && !empty($password)) {
            if (isset($_SESSION['user'])) {
                $pseudoExist = $this->user->getPseudoExist($username);
                if ($pseudoExist == 0) {
                    $this->user->inscription($prenom, $nom, $username, $password);
                    header('Location: index.php?action=membres');
                    $_SESSION['flash'] = 'Un nouveau membre vient d\'être enregistré.';
                }
                else {
                    $_SESSION['flash'] = 'Ce pseudo est déjà pris. Veuillez saisir un autre pseudo';
                    header('Location: index.php?action=membres');
                }
            }
            else {
                $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
                header('Location: index.php?action=accueil');
            }
        }
        else {
            $_SESSION['flash'] = 'Veuillez renseigner tous les champs du formulaire.';
            header('Location: index.php?action=membres');
        }


    }

    // désinscrire un membre
    /**
     * @param int $idUser
     */
    public function deleteUser($idUser)
    {
        if (isset($_SESSION['user'])) {
            $this->user->deleteUser($idUser);
            $users = $this->user->getUsers();
            $_SESSION['flash'] = 'Un membre vient d\'être supprimé.';
            $vue = new Vue("Membres");
            $vue->generer(array('users' => $users));
        }
        else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }

}
