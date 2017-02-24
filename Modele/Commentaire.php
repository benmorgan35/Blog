<?php

require_once 'Modele.php';
/**
 * Fournit les services d'accès aux genres musicaux
 *
 * @author Baptiste Pesquet
 */
class Commentaire extends Modele
{

    // Renvoie un commentaire à un billet

    public function getCommentaire($idCommentaire)
    {
        $sql = 'SELECT idC, dateCrea, auteur, contenu, idParent, profondeur FROM tCommentaires WHERE idC=?';// ORDERBY ggg, gggg;
        $commentaire = $this->executerRequete($sql, array($idCommentaire));
        return $commentaire;
    }

        // Renvoie la liste des commentaires associés à un billet

        public function getCommentaires($idBillet)
        {
            $sql = 'SELECT idC, dateCrea, auteur, contenu FROM tCommentaires WHERE idB=?';// ORDERBY ggg, gggg;
            $commentaires = $this->executerRequete($sql, array($idBillet));
            return $commentaires;
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


    // Ajoute un commentaire à un billet dans la base

    public function ajouterCommentaire($auteur, $contenu, $idBillet)
    {
        $sql = 'INSERT INTO tCommentaires(dateCrea, auteur, contenu, idB) values(?, ?, ?, ?)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
    }

    public function formulaireReponse($idBillet, $idCommentaire)
    {
        $sql = 'SELECT idC, dateCrea, auteur, contenu FROM tCommentaires WHERE idB=? AND idC=?';

        $this->executerRequete($sql, array($idBillet, $idCommentaire));

    }





   // Repondre à un commentaire

    public function repondreCommentaire($auteur, $contenu, $idBillet, $idCommentaire)
    {
        $commentaireParent = $this->getCommentaire($idCommentaire);
        $sql = 'INSERT INTO tCommentaires(dateCrea, auteur, contenu, idB, idParent, profondeur) values(?, ?, ?, ?, ?, ?)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet, $commentaireParent['idC'], $commentaireParent['profondeur'] + 1));

    }





// supprime un commentaire
    public function supprimerCommentaire()
    {

    }

   // signaler un commentaire

    public function signalerCommentaire()
    {

    }


}