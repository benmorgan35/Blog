<?php

class user
{
    protected $_id;
    protected $_username;
    protected $_password;



// construct : permet d'hydrater directement l'objet lors de l'instanciation de la classe

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

//hydrate : permet d'assigner aux attributs de l'objet les valeurs correspondantes, passées en paramètre dans un tableau.

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
// On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);
// Si le setter correspondant existe, on l'appelle.
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


// getters et setters

    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        $id = (int)$id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function getUsername()
    {
        return $this->_username;
    }

    public function setUserName($username)
    {
        if (is_string($username)) {
            $this->_username = $username;
        }
    }

    public function getPassword()
    {
        return $this->_password;
    }

    public function setPasswword($password)
    {
        if (is_string($password)) {
            $this->_password = $password;
        }
    }


}
