<?php

require_once 'Modele.php';

Class User extends  Modele {
    protected $_prenom;
    protected $_nom;
    protected $_username;
    protected $_password;



    // Renvoie la liste des membres
    public function getusers() {
        $sql = 'SELECT * FROM tusers ORDER BY idU ASC';
        $users = $this->executerRequete($sql);
        return $users;
    }

    // Renvoie les infos d'un membre
    public function getuser($username, $password)
    {
        $sql = 'SELECT * FROM tusers WHERE username=? AND password=?';
        $user = $this->executerRequete($sql, array($username, $password));
        if ($user->rowCount() > 0)
            return $user->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("");
    }

    // inscrire un nouveau membre
    public function inscription($prenom, $nom, $username, $password){
        //$password_hashe = sha1($_POST['password']);
        $sql = 'INSERT INTO tusers(dateCrea, prenom, nom, username, password) values(?, ?, ?, ?, ?)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($date, $prenom, $nom, $username, $password /*$password_hashe*/));
   }

    // Désinscrire un membre
    public function deleteUser($idU){
        $sql = 'DELETE FROM tUsers WHERE idU=?';
        $this->executerRequete($sql, array($idU));
    }
}