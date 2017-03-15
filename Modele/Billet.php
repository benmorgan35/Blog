<?php

require_once 'Modele.php';


class Billet extends Modele {

    // Renvoie la liste des billets publiés

    public function getBillets() {
        $sql = 'SELECT *, DATE_FORMAT (dateCrea, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM tbillets WHERE publication = 1 ORDER BY idB DESC';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    // Renvoie les informations sur un billet
    public function getBillet($idBillet) {
        $sql = 'SELECT *, DATE_FORMAT (dateCrea, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM tbillets WHERE idB=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }

    // Renvoie la liste admin de tous les billets publiés, brouillons et supprimés
    public function getAdminBillets() {
        $sql = 'SELECT *, DATE_FORMAT (dateCrea, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM tbillets ORDER BY idB DESC';
        $adminBillets = $this->executerRequete($sql);
        return $adminBillets;
    }

    // Ajoute un billet dans brouillon
    public function brouillonBillet($titre, $contenu)
    {
        $sql = 'INSERT INTO tbillets(titre, dateCrea, contenu, publication) values(?, ?, ?, 0)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($titre, $date, $contenu));
    }

    // Publie un billet
    public function publierBillet($titre, $contenu)
    {
        $sql = 'INSERT INTO tbillets(titre, dateCrea, contenu, publication) values(?, ?, ?, 1)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($titre, $date, $contenu));
    }

    // modifie un billet et le publier
    public function publierUpdate ($idBillet, $titre, $contenu){
        $sql = "UPDATE tbillets SET titre='" . $_POST['titre'] . "', contenu='" . $_POST['contenu'] . "', publication=1 WHERE idB = '" . $_GET['idB'] . "'";
        $this->executerRequete($sql, array($idBillet, $titre, $contenu));
    }

    // modifie billet et l'enregistrer en tant que brouillon
    public function brouillonUpdate($idBillet, $titre, $contenu){
        $sql = "UPDATE tbillets SET titre='" . $_POST['titre'] . "', contenu='" . $_POST['contenu'] . "', publication=0 WHERE idB = '" . $_GET['idB'] . "'";
        $this->executerRequete($sql, array($idBillet, $titre, $contenu));
    }

    // Supprime un billet
    public function deleteBillet($idBillet){
        $sql = 'UPDATE tbillets SET publication=2 WHERE idB=?';
        $this->executerRequete($sql, array($idBillet));
    }
}