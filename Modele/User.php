<?php

require_once 'Modele.php';

Class User extends  Modele {

    private $_username;
    private $_password;

    public function getUsername(){
        return ucfirst($this->_username);
    }

    public function getPassword(){
        return ucfirst($this->_password);
    }

    public function setUserName($username){
        $this->_username = $username;
    }
    public function setPassword($password){
        $this->_password = $password;
    }


    public function add(Billets $billet){

    }

    public function save(Billet $billets){

    }

    public function count(){

    }

    public function delete(){

    }

    public function update();



    //Implementer les methodes de l'interface'
    //public function methode1();
}