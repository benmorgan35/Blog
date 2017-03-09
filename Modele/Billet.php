<?php

require_once 'Modele.php';


class Billet extends Modele {

    // Renvoie la liste des billets publiés

    public function getBillets() {
        $sql = 'SELECT * FROM tBillets WHERE publication = 1 ORDER BY idB DESC';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    // Renvoie la liste admin de tous les billets publiés, brouillons et supprimés

    public function getAdminBillets() {
        $sql = 'SELECT * FROM tBillets ORDER BY idB DESC';
        $adminBillets = $this->executerRequete($sql);
        return $adminBillets;
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


    // Renvoie les informations sur un bille lié à un commentairet///////////////////////////////////////////////////////////////
    public function getBilletCom($idCommentaire) {
        //$sql = 'SELECT * FROM tBillets WHERE idC=?';
        //$billet = $this->executerRequete($sql, array($idCommentaire));
        //if ($billet->rowCount() > 0)
        //    return $billet->fetch();  // Accès à la première ligne de résultat
       // else
         //   throw new Exception("Aucun billet ne correspond à l'identifiant '$idCommentaire'");
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    }

    // Ajouter un billet dans brouillon
    public function brouillonBillet($titre, $contenu)
    {
        $sql = 'INSERT INTO tBillets(titre, dateCrea, contenu, publication) values(?, ?, ?, 0)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($titre, $date, $contenu));
    }

    // Publier un billet
    public function publierBillet($titre, $contenu)
    {
        $sql = 'INSERT INTO tBillets(titre, dateCrea, contenu, publication) values(?, ?, ?, 1)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($titre, $date, $contenu));
    }



    // modifier billet BEN et le publier
    public function updatePublierBillet($idBillet, $titre, $contenu){
        $sql = "UPDATE tBillets SET titre='" . $_POST['titre'] . "', contenu='" . $_POST['contenu'] . "', publication=1 WHERE idB = '" . $_GET['idB'] . "'";
        $this->executerRequete($sql, array($idBillet, $titre, $contenu));
    }

    // modifier billet BEN et l'enregistrer en tant que brouillon
    public function updateBrouillonBillet($idBillet, $titre, $contenu){
        $sql = "UPDATE tBillets SET titre='" . $_POST['titre'] . "', contenu='" . $_POST['contenu'] . "', publication=0 WHERE idB = '" . $_GET['idB'] . "'";
        $this->executerRequete($sql, array($idBillet, $titre, $contenu));
    }

    // Supprimer un billet BEN
    public function deleteBillet($idBillet){
        $sql = 'UPDATE tBillets SET publication=2 WHERE idB=?';
        $this->executerRequete($sql, array($idBillet));
    }
}