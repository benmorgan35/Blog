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
        $sql = 'SELECT * FROM tCommentaires WHERE idB=? ORDER BY idC ASC';// rajouter idC ??
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }




// Renvoie les informations sur un commentaire
    public function getCommentaire($idCommentaire)
    {
        $sql = 'SELECT * FROM tCommentaires WHERE idC=?';
        $commentaire = $this->executerRequete($sql, array($idCommentaire));
        if ($commentaire->rowCount() > 0)
            return $commentaire->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun commentaire ne correspond à l'identifiant '$idCommentaire'");
    }

    // Ajoute un commentaire à un billet dans la base
    public function ajouterCommentaire($auteur, $contenu, $idBillet)
    {
        $sql = 'INSERT INTO tCommentaires(dateCrea, auteur, contenu, idB, idParent, profondeur) values(?, ?, ?, ?, NULL , 0)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
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