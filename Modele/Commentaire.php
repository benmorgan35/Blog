<?php

require_once 'Modele.php';


class Commentaire extends Modele
{

    // Renvoie la liste de tous les commentaires
    public function getAdminCommentaires()
    {
        $sql = 'SELECT * FROM tCommentaires ORDER BY signalement DESC, idC DESC';
        $adminCommentaires = $this->executerRequete($sql);
        return $adminCommentaires;

    }

    // Renvoie la liste des commentaires de profondeur 0 associés à un billet
    public function getCommentaires($idBillet)
    {
        $sql = 'SELECT * FROM tCommentaires WHERE idB=? AND profondeur=0 ORDER BY idC ASC';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    //Renvoie la liste des commentaires de profondeur 1 associés à un commentaire
    public function getCommentairesChilds($idBillet)
    {
        $sql = 'SELECT * FROM tCommentaires WHERE idB=? AND profondeur=1 ORDER BY idC ASC';
        $reponses = $this->executerRequete($sql, array($idBillet));
        return $reponses;
    }

    //Renvoie la liste des commentaires de profondeur 2 associés à une réponse
    public function getReponsesChilds($idBillet)
    {
        $sql = 'SELECT * FROM tCommentaires WHERE idB=? AND profondeur=2 ORDER BY idC ASC';
        $reponses = $this->executerRequete($sql, array($idBillet));
        return $reponses;
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
    public function supprimerCommentaire($idCommentaire, $idParent)
    {
        //$sql = 'DELETE FROM tcommentaires WHERE idC=$_GET["idC"] AND idParent=$_GET["idC"}';
        //$this->executerRequete($sql);
    }

    // signaler un commentaire
    public function signalerCommentaire()
    {
        $sql = 'UPDATE tcommentaires SET signalement = 1 WHERE idC=?';
        $this->executerRequete($sql);
        echo "Ce commentaire a été signalé à l'administrateur.";
    }

}