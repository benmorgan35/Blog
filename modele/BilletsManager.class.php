<?php

class BilletsManager
{
    protected $_db; // instance de PDO

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function add(Billets $billets)
    {
        $q = $this->_db->prepare('INSERT INTO billets(titre, dateCrea, contenu) VALUES(:titre, :NOW(), :contenu)'); // preparation de la requete d'insertion

        // Assignation des valeurs
        $q->bindValue(':titre', $billets->getTitre());
        $q->bindValue(':contenu', $billets->getContenu());

        $q->execute(); // Execution de la requete
    }

    public function count() // Execute une requête COUNT() et retourne le nombre de résultats retournés
    {
        return $this->_db > query('SELECT COUNT(*) FROM billets')->fetchColumn();
    }

    public function delete($id)
    {
        $this->_db->exec('DELETE FROM billets WHERE id = ' .(int) $id);
    }


    //Renvoie la liste de tous les billets
    public function getList($titre) //
    {
        $billets = [];

        $q = $this->_db->prepare('SELECT id, titre, dateCrea, contenu FROM billets WHERE titre <> :titre ORDER BY id desc');
        $q->execute([':titre' => $titre]);

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $billets[] = new Billet($donnees);
        }

        return $billets;
    }

    /**
     * Méthode retournant uj billet précis.
     * @param $id int L'identifiant du billet à récupérer
     */

    public function getUnique($id)
    {
        $requete = $this->db->prepare('SELECT id, titre, dateCrea, contenu FROM billets WHERE id = :id');
        $requete->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $requete->execute();

        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Billets');

        $billets = $requete->fetch();

        $billets->setDateCrea(new DateTime($billets->dateCrea()));

        return $billets;
    }

    /**
     * Méthode permettant d'enregistrer un billet.
     */

    public function save(Billets $billets)
    {
        if ($billets->isValid())
        {
            $billets->isBillet() ? $this->add($billets) : $this->update($billets);
        }
        else
        {
            throw new RuntimeException('Le billet doit être valide pour être enregistré');
        }
    }


    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }

}



