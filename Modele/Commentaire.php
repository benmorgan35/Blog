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
        $sql = 'SELECT COM_ID AS id, DATE_FORMAT(COM_DATE, \'%d/%m/%Y à %Hh%imin%ss\') AS dateFR,'
            . ' COM_AUTEUR AS auteur, COM_CONTENU AS contenu FROM T_COMMENTAIRE'
            . ' WHERE BIL_ID=?';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    // Ajoute un commentaire à un billet dans la base
    public function ajouterCommentaire($auteur, $contenu, $idBillet)
    {

            $sql = 'INSERT INTO T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
                . ' values(?, ?, ?, ?)';
            $date = date(DATE_W3C);  // Récupère la date courante
            $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));

    }

// Ajoute un commentaire à un commentaire dans la base



// supprime un commentaire
    public function supprimerCommentaire()
    {

    }

   // signaler un commentaire

    public function signalerCommentaire(){

    }


}