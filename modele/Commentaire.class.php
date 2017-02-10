<?php

class Commentaire
{
    protected $_id;
    protected $_dateCrea;
    protected $_pseudo;
    protected $_titre;
    protected $_contenu;
    protected $_idBillet;
    protected $_idParent;

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

    public function getDateCrea()
    {
        return $this->_dateCrea;
    }

    public function setDateCrea($dateCrea)
    {
            $this->_dateCrea = $dateCrea;
    }

    public function getPseudo()
    {
        return $this->_pseudo;
    }

    public function setPseudo($pseudo)
    {
        if (is_string($pseudo)) {
            $this->_pseudo = $pseudo;
        }
    }

    public function getTitre()
    {
        return $this->_titre;
    }

    public function setTitre($titre)
    {
        if (is_string($titre)) {
            $this->_titre = $titre;
        }
    }

    public function getContenu()
    {
        return $this->_contenu;
    }

    public function setContenu($contenu)
    {
        if (is_string($contenu)) {
            $this->_contenu = $contenu;
        }
    }

    public function getIdBillet()
    {
        return $this->_idBillet;
    }

    public function setIdBillet($idBillet)
    {
        $idBillet = (int)$idBillet;
        if ($idBillet > 0) {
            $this->_idBillet = $idBillet;
        }
    }

    public function getIdParent()
    {
        return $this->_idParent;
    }

    public function setIdParent($idParent)
    {
        $idParent = (int)$idParent;
        if ($idParent > 0) {
            $this->_idParent = $idParent;
        }
    }

}
