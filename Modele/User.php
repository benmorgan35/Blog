<?php

require_once 'Modele.php';

Class User extends  Modele {
    private $_prenom;
    private $_username;
    private $_password;

    public function getPrenom(){
        return ucfirst($this->_prenom);
    }

    public function getUsername(){
        return ucfirst($this->_username);
    }

    public function getPassword(){
        return ucfirst($this->_password);
    }

    public function setPrenom($prenom){
        $this->_prenom = $prenom;
    }

    public function setPassword($password){
        $this->_password = $password;
    }

    public function getuser($username, $password)
    {
        $sql = 'SELECT * FROM users WHERE username=? AND password=?';
        $user = $this->executerRequete($sql, array($username, $password));
        if ($user->rowCount() > 0)
            return $user->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("");
    }


    public function add(Billets $billet){

    }

    public function save(Billet $billets){

    }

    public function count(){

    }

    public function delete(){

    }

    public function update(){}



    //Implementer les methodes de l'interface'
    //public function methode1();
}