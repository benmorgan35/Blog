<?php

require_once 'Modele.php';


class authentification extends Modele {

    /** Renvoie la liste des billets du blog
     *
     * @return PDOStatement La liste des billets
     */
    public function authentification($username, $password) {
        $sql = 'SELECT * FROM users WHERE username=? AND password=?';
        $user = $this->executerRequete($sql, array($id));
        if ($user->rowCount() > 0)
            return $user->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("");
    }




    // Créer un  BEN
    public function creerBillet(){

    }

    // Mise à jour de billet BEN
    public function updateBillet(){

    }

    // Supprimer un billet BEN
    public function deleteBillet(){

    }
