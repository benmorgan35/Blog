<?php

require_once 'Modele.php';


class Commentaire extends Modele
{

    // Renvoie les informations sur un commentaire
    public function getCommentaire($idCommentaire)
    {
        $sql = 'SELECT *, DATE_FORMAT (dateCrea, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM tcommentaires WHERE idC=?';
        $commentaire = $this->executerRequete($sql, array($idCommentaire));
        if ($commentaire->rowCount() > 0)
            return $commentaire->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun commentaire ne correspond à l'identifiant '$idCommentaire'");
    }

    // Renvoie la liste des commentaires de profondeur 0 associés à un billet
    public function getCommentaires($idBillet)
    {
        $sql = 'SELECT *, DATE_FORMAT (dateCrea, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM tcommentaires WHERE idB=? AND profondeur=0 ORDER BY idC ASC';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    //Renvoie la liste des sous commentaire
    public function getCommentaireChilds($idCommentaire)
    {
        $sql = 'SELECT *, DATE_FORMAT (dateCrea, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM tcommentaires WHERE idParent=? ORDER BY idC ASC';
        $reponses = $this->executerRequete($sql, array($idCommentaire));
        return $reponses;
    }

    // Ajoute un commentaire à un billet dans la base
    public function ajouterCommentaire($auteur, $contenu, $idBillet)
    {
        $sql = 'INSERT INTO tcommentaires(dateCrea, auteur, contenu, idB, idParent, profondeur) values(?, ?, ?, ?, NULL , 0)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
    }

    // Repondre à un commentaire
    public function repondreCommentaire($auteur, $contenu, $idBillet, $idCommentaire)
    {
        $commentaireParent = $this->getCommentaire($idCommentaire);
        $sql = 'INSERT INTO tcommentaires(dateCrea, auteur, contenu, idB, idParent, profondeur) values(?, ?, ?, ?, ?, ?)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet, $commentaireParent['idC'], $commentaireParent['profondeur'] + 1));
    }

    // signaler un commentairesignalement
    public function signalerCommentaire($idCommentaire)
    {
        $sql = 'UPDATE tcommentaires SET signalement = 1 WHERE idC=?';
        $this->executerRequete($sql, array($idCommentaire));
    }



    // Renvoie la liste de tous les commentaires
    public function getAdminCommentaires()
    {
        $sql = 'SELECT *, DATE_FORMAT (dateCrea, \'%d/%m/%Y à %H:h%i:%s\') AS date_fr FROM tcommentaires ORDER BY signalement DESC, idC DESC';
        $adminCommentaires = $this->executerRequete($sql);
        return $adminCommentaires;
    }

    // Renvoie le nombres de commentaires signalés
    public function getNbSignalements()
    {
      $sql = 'SELECT COUNT(*) as total FROM tcommentaires WHERE signalement>0';
      $result = $this->executerRequete($sql);
      $nb = $result->fetch();
      $nbSignalements = $nb['total'];
      return $nbSignalements;
    }

    // supprime un commentaire
    public function deleteCommentaire($idCommentaire)
    {
        $sql = 'UPDATE tcommentaires SET auteur = \'Modérateur\', contenu = \'(Commentaire supprimé) \', is_deleted = 1 WHERE idC=?';
        $this->executerRequete($sql, array($idCommentaire));
    }

    // Annule un signalement
    public function annulerSignalement($idCommentaire)
    {
        $sql = 'UPDATE tcommentaires SET signalement = 0 WHERE idC=?';
        $this->executerRequete($sql, array($idCommentaire));
    }



}