<?php

class Billet
{
    protected $erreurs = [];
    protected $_id;
    protected $_dateCrea;
    protected $_titre;
    protected $_contenu;

    /**
     * Constantes relatives aux erreurs possibles rencontrées lors de l'exécution de la méthode.
     */
    const TITRE_INVALIDE = 1;
    const CONTENU_INVALIDE = 2;


    /**
     * Constructeur de la classe qui assigne les données spécifiées en paramètre aux attributs correspondants.
     * @param $valeurs array Les valeurs à assigner
     * @return void
     */

    public function __construct($valeurs = [])
    {
        if (!empty($valeurs)) // Si on a spécifié des valeurs, alors on hydrate l'objet.
        {
            $this->hydrate($valeurs);
        }
    }

    /**
     * Méthode assignant les valeurs spécifiées aux attributs correspondant.
     * @param $donnees array Les données à assigner
     * @return void
     */
    public function hydrate($donnees)
    {
        foreach ($donnees as $attribut => $valeur)
        {
            $methode = 'set'.ucfirst($attribut);

            if (is_callable([$this, $methode]))
            {
                $this->$methode($valeur);
            }
        }
    }

    /**
     * Méthode permettant de savoir si le billet est nouveau.
     * @return bool
     */
    public function isBillet()
    {
        return empty($this->id);
    }

    /**
     * Méthode permettant de savoir si le billet est valide.
     * @return bool
     */
    public function isValid()
    {
        return !(empty($this->titre) || empty($this->contenu));
    }



// getters et setters


    public function erreurs()
    {
        return $this->erreurs;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
            $this->id = (int) $id;
    }

    public function getDateCrea()
    {
        return $this->dateCrea;
    }

    public function setDateCrea($dateCrea)
    {
            $this->dateCrea = $dateCrea;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        if (!is_string($titre) || empty($titre))
        {
            $this->erreurs[] = self::TITRE_INVALIDE;
        }
        else
        {
            $this->titre = $titre;
        }
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function setContenu($contenu)
    {
        if (!is_string($contenu) || empty($contenu))
        {
            $this->erreurs[] = self::CONTENU_INVALIDE;
        }
        else
        {
            $this->contenu = $contenu;
        }
    }

}
