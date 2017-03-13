<?php

require_once 'Modele.php';

Class User extends  Modele {
    protected $_prenom;
    protected $_nom;
    protected $_username;
    protected $_password;



    // Renvoie la liste des membres
    public function getusers() {
        $sql = 'SELECT *, DATE_FORMAT (dateCrea, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM tusers ORDER BY idU ASC';
        $users = $this->executerRequete($sql);
        return $users;
    }

    // Renvoie les infos d'un membre
    public function getuser($username)
    {

        $sql = 'SELECT *, DATE_FORMAT (dateCrea, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM tusers WHERE username=? AND password=?';
        $pwd = sha1($_POST['password']);
        $user = $this->executerRequete($sql, array($username, $pwd));
        return $user->fetch();  // Accès à la première ligne de résultat

    }

    // inscrire un nouveau membre
    public function inscription($prenom, $nom, $username){
        $pwd = sha1($_POST['password']);
        $sql = 'INSERT INTO tusers(dateCrea, prenom, nom, username, password) values(?, ?, ?, ?, ?)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($date, $prenom, $nom, $username, $pwd));
   }

    // Désinscrire un membre
    public function deleteUser($idU){
        $sql = 'DELETE FROM tusers WHERE idU=?';
        $this->executerRequete($sql, array($idU));
    }
}