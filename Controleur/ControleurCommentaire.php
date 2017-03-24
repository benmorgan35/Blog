<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';


class ControleurCommentaire
{

    private $billet;
    private $commentaire;


    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails d'un commentaire sur une nouvelle page
    /**
     * @param int $idCommentaire
     */
    public function commentaire($idCommentaire)
    {
        $commentaire = $this->commentaire->getCommentaire($idCommentaire);
        $vue = new Vue("Commentaire");
        $vue->generer(array('commentaire' => $commentaire));
    }

    // Ajoute un commentaire à un billet
    /**
     * @param string $auteur
     * @param string $contenu
     * @param int $idBillet
     */
    public function commenter($auteur, $contenu, $idBillet)
    {

        if (!empty($auteur) && !empty($contenu)) {
            // Sauvegarde du commentaire
            $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
            // Actualisation de l'affichage du billet
            header('Location: index.php?action=billet&idB=' . $idBillet);
            $_SESSION['flash'] = 'Votre commentaire est publié.';
        }
        else {
            $_SESSION['flash'] = 'Veuillez renseigner tous les champs du formulaire.';
            header('Location: index.php?action=billet&idB=' . $idBillet);
        }
    }

    //répondre à un commentaire
    /**
     * @param string $auteur
     * @param string $contenu
     * @param int $idBillet
     * @param int $idCommentaire
     */
    public function repondre($auteur, $contenu, $idBillet, $idCommentaire)
    {
        if (!empty($auteur) && !empty($contenu)) {
            // Sauvegarde du commentaire
            $this->commentaire->repondreCommentaire($auteur, $contenu, $idBillet, $idCommentaire);
            // Actualisation de l'affichage du billet
            header('Location: index.php?action=billet&idB=' . $idBillet);
            $_SESSION['flash'] = 'Votre commentaire est publié.';
        }
        else {
            $_SESSION['flash'] = 'Veuillez renseigner tous les champs du formulaire.';
            header('Location: index.php?action=billet&idB=' . $idBillet);
        }
    }

    //Signaler un commentaire
    /**
     * @param int $idCommentaire
     */
    public function signalerCommentaire($idCommentaire){
        $this->commentaire->signalerCommentaire($idCommentaire);
        $commentaire = $this->commentaire->getCommentaire($idCommentaire);
        header ('Location: index.php?action=billet&idB=' . $commentaire['idB']);
        $_SESSION['flash'] = 'Votre signalement a été pris en compte.';
    }


}
