<?php

require_once 'Modele.php';


class Billet extends Modele {

    // Renvoie la liste des billets du blog

    public function getBillets() {
        $sql = 'SELECT * FROM tBillets ORDER BY idB DESC';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    // Renvoie les informations sur un billet
    public function getBillet($idBillet) {
        $sql = 'SELECT * FROM tBillets WHERE idB=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }

    // Ajouter un billet
    public function addBillet($titre, $contenu)
    {
        $sql = 'INSERT INTO tBillets(titre, dateCrea, contenu) values(?, ?, ?)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($titre, $date, $contenu));
    }

    // modifier billet BEN
    public function updateBillet($titre, $contenu){
        //$sql = 'UPDATE FROM tBillets WHERE idB=?';
        //$this->executerRequete(array($titre, $contenu));
    }

    // Supprimer un billet BEN
    public function deleteBillet($idBillet){
        //$sql = 'DELETE FROM tBillets WHERE idB=$_GET["idB”]}';
        //$sql = 'DELETE FROM tCommentaires WHERE idB=$_GET["idB”]}';
        //$this->executerRequete($sql);
    }
}