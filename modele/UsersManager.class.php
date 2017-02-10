<?php
class UsersManager
{

    private $users = array();

    protected $db; // instance de PDO

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function setDB($db)
    {
        $this->db = $db;
    }

    // se connecter

    // se déconnecter

    //supprimer un billet

    //modifier un billet

    //supprimer un commentaire

    //ajouter un commentaire

}