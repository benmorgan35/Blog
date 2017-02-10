<?php

class CommentairesManager
{
    private $_db; // instance de PDO

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function add(Commentaire $commentaire)
    {
        $q = $this->_db->prepare('INSERT INTO commentaires(dateCrea, pseudo, titre, contenu, idBillet, idParent) VALUES(:dateCrea, :pseudo, :titre, :contenu, :idBillet, :idParent)'); // preparation de la requete d'insertion

        // Assignatin des valeurs
        $q->bindValue(':dateCrea', $commentaire->getDateCrea());
        $q->bindValue(':pseudo', $commentaire->getPseudo());
        $q->bindValue(':titre', $commentaire->getTitre());
        $q->bindValue(':contenu', $commentaire->getContenu());
        $q->bindValue(':idBillet', $commentaire->getIdBillet());
        $q->bindValue(':idParent', $commentaire->getIdParent());



        $q->execute(); // Execution de la requete

        // Hydratation du billet passé en paramètre avec assignation
        $commentaire->hydrate([
            'id' => $this->_db->lastInsertId()
        ]);
    }

    public function count() // Execute une requête COUNT() et retourne le nombre de résultats retournés
    {
        return $this->_db > query('SELECT COUNT(*) FROM commentaires')->fetchColumn();
    }

    public function delete(Commentaire $commentaire)
    {
        $this->_db->exec('DELETE FROM commentaires WHERE id = ' . $commentaire->getId());
    }

    public function exists($info)
    {
        if (is_int($info)) // On veut voir si tel billet ayant pour id $info existe.
        {
            return (bool)$this->_db->query('SELECT COUNT (*) FROM commentaires WHERE id = ' . $info)->fetchColumn();
        }

        // sinon c'est qu'on veut vérifier que le titre existe ou pas.

        $q = $this->_db->prepare('SELECT COUNT(*) FROM Commentaires WHERE titre = :titre');
        $q->execute([':titre' => $info]);

        return (bool)$q->fetchColumn();
    }


    public function get($info) // execute une requete et retourne un objet Billet
    {
        if (is_int($info)) {
            $q = $this->_db->query('SELECT id, dateCrea, pseudo, titre, contenu, idBillet, idParent FROM commentaires WHERE id = ' . $info);
            $donnees = $q->fetch(PDO::FETCH_ASSOC);

            return new Commentaire($donnees);
        } else {
            $q = $this->_db->prepare('SELECT id, dateCrea, pseudo, titre, contenu, idBillet, idParent FROM commentaire WHERE titre = :titre');
            $q->execute([':id' => $info, ':dateCrea' => $info, ':pseudo' => $info, ':titre' => $info, ':contenu' => $info, ':idBillet' => $info, ':idParent' => $info, ]);

            return new Commentaire($q->fetch(PDO::FETCH_ASSOC));
        }
    }

    public function getList($id) // Retourne la liste des commentaires associés à un billet
    {
        $commentaires = [];

        $q = $this->_db->prepare('SELECT id, dateCrea, pseudo, titre, contenu, idBillet, idParent FROM commentaires WHERE id = ' . $id . ' ORDER BY id DESC');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $commentaires[] = new Commentaire($donnees);
        }

        return $commentaires;
    }


    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }

}

