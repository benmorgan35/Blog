<?php

require_once 'Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux
 *
 * @author Baptiste Pesquet
 */
class Commentaire extends Modele
{



    // Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet)
    {
        $sql = 'SELECT * FROM tCommentaires WHERE idB=?';// rajouter idC ??
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    // Ajoute un commentaire à un billet dans la base
    public function ajouterCommentaire($auteur, $contenu, $idBillet)
    {
        $sql = 'INSERT INTO tCommentaires(dateCrea, auteur, contenu, idB, idParent, profondeur) values(?, ?, ?, ?, NULL , 0)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
    }

    // Renvoie les informations sur un commentaire
    public function getCommentaire($idCommentaire) {
        $sql = 'SELECT * FROM tCommentaires WHERE idC=?';
        $commentaire = $this->executerRequete($sql, array($idCommentaire));
        if ($commentaire->rowCount() > 0)
            return $commentaire->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun commentaire ne correspond à l'identifiant '$idCommentaire'");
    }


    // Repondre à un commentaire
    public function repondreCommentaire($auteur, $contenu, $idBillet, $idCommentaire)
    {
        $commentaireParent = $this->getCommentaire($idCommentaire);
        $sql = 'INSERT INTO tCommentaires(dateCrea, auteur, contenu, idB, idParent, profondeur) values(?, ?, ?, ?, ?, ?)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet, $commentaireParent['idC'], $commentaireParent['profondeur'] + 1));

    }

    /*
           //rajout Ben
           // Renvoie la liste de réponses associées à un commentaire
           /*
           public function getReponses($idCommentaire)
           {
               $sql = 'SELECT COM_ID AS id, DATE_FORMAT(COM_DATE, \'%d/%m/%Y à %Hh%imin%ss\') AS dateFR, COM_AUTEUR AS auteur, COM_CONTENU AS contenu FROM T_COMMENTAIRE WHERE BIL_ID=? AND COM_ID=?' AND GAUCHE - DROITE >1;
               $reponses = $this->executerRequete($sql, array($idCommentaire));
               return $reponses;
           }

       */


// supprime un commentaire
    public function supprimerCommentaire()
    {

    }

    // signaler un commentaire

    public function signalerCommentaire()
    {

    }


}