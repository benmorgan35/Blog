<?php

require_once 'Modele.php';


class Billet extends Modele {

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    public function getBillets() {
        $sql = 'SELECT * FROM tBillets ORDER BY idB DESC';
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
        $sql = 'SELECT * FROM tBillets WHERE idB=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }

    // Ajouter un billet

        public function ajouterBillet($titre, $contenu)
        {
            $sql = 'INSERT INTO tBillets(dateCrea, titre, contenu) values(?, ?, ?)';
            $date = date(DATE_W3C);  // Récupère la date courante
            $this->executerRequete($sql, array($date, $titre, $contenu, $idB));
        }



    // modifier billet BEN
    public function updateBillet($idBillet){
        //$sql = 'UPDATE FROM tBillets WHERE idB=?';
        //$this->executerRequete($sql);
    }

    // Supprimer un billet BEN
    public function deleteBillet($idBillet){
        //$sql = 'DELETE FROM tBillets WHERE idB=$_GET["idB”]}';
        //$this->executerRequete($sql);
    }
}