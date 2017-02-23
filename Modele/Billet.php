<?php

require_once 'Modele.php';


class Billet extends Modele {

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    public function getBillets() {
        $sql = 'SELECT BIL_ID AS id, DATE_FORMAT(BIL_DATE, \'%d/%m/%Y  %Hh%imin%ss\') AS dateFR,'
                . ' BIL_TITRE AS titre, BIL_CONTENU AS contenu FROM T_BILLET'
                . ' ORDER BY BIL_ID DESC';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    /** Renvoie les informations sur un billet
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getBillet($idBillet) {
        $sql = 'SELECT BIL_ID AS id, DATE_FORMAT(BIL_DATE, \'%d/%m/%Y\') AS dateFR,'
                . ' BIL_TITRE AS titre, BIL_CONTENU AS contenu FROM T_BILLET'
                . ' WHERE BIL_ID=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }

    // Créer un billet  BEN
    /*
    public function addBillet($BIL_TITRE, $BIL_DATE, $BIL_CONTENU){
        $sql = 'INSERT INTO T_BILLET(BIL_TITRE, BIL_DATE, BIL_CONTENU)'
            . ' values(?, ?, ?)';
        $BIL_DATE = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($BIL_TITRE, $BIL_DATE, $BIL_CONTENU));
    }
    */
    // Mise à jour de billet BEN
    public function updateBillet(){
        //$sql = 'UPDATE FROM T_BILLET WHERE BIL_ID=?';
        //$this->executerRequete($sql);
    }

    // Supprimer un billet BEN
    public function deleteBillet($idBillet){
        //$sql = 'DELETE FROM T_BILLET WHERE BIL_ID=?';
        //$this->executerRequete($sql);
    }
}