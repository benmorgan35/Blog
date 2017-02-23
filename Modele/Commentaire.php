<?php

require_once 'Modele.php';
/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class Commentaire extends Modele
{

    // Renvoie la liste des commentaires associés à un billet

    public function getCommentaires($idBillet)
    {
        $sql = 'SELECT COM_ID AS id, DATE_FORMAT(COM_DATE, \'%d/%m/%Y à %Hh%imin%ss\') AS dateFR,'
            . ' COM_AUTEUR AS auteur, COM_CONTENU AS contenu FROM T_COMMENTAIRE'
            . ' WHERE BIL_ID=?';// ORDERBY ggg, gggg;
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }
/*
    //rajout Ben
    // Renvoie la liste de réponses associées à un commentaire
    /*
    public function getReponses($idCommentaire)
    {
        $sql = 'SELECT COM_ID AS id, DATE_FORMAT(COM_DATE, \'%d/%m/%Y à %Hh%imin%ss\') AS dateFR, COM_AUTEUR AS auteur, COM_CONTENU AS contenu FROM T_COMMENTAIRE WHERE BIL_ID=? AND COM_ID=?' AND GAUCHE - DROITE >1;
        $reponses = $this->executerRequete($sql, array($idCommentaire));
        return $reponses;
    }

*/


    // Ajoute un commentaire à un billet dans la base

    public function ajouterCommentaire($auteur, $contenu, $idBillet)
    {
            $sql = 'INSERT INTO T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID, PARENT_ID, GAUCHE, DROITE, PROFONDEUR) values(?, ?, ?, ?, 0, 1, 1000, 0)';
            $date = date(DATE_W3C);  // Récupère la date courante
            $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
    }

    /* Ajouter un commentaire

    public function ajouterCommentaire(){

        if (1ere insertion profondeur 0) {
        INSERT ($COM_ID = ?, $BILLET_ID = ?, $COM_AUTEUR = ?, $COM_CONTENU = ?, $PARENT_ID = 0, $GAUCHE = 1, $DROITE = 2, $DEPTH = 0)
        }

        elseif (ajout d un frere de profondeur 0) {
        INSERT ($COM_ID = ?, $BILLET_ID = ?, $COM_AUTEUR = ?, $COM_CONTENU = ?, $PARENT_ID = 0, $GAUCHE = $GAUCHEFRERE1er+2, $DROITE = $DROITEFRERE1er+2, $DEPTH = 0)
        }

        elseif (ajout du 1er enfant de profondeur 1{
        UPDATE le parent ($GAUCHE = 1, $DROITE = $DROITE+2)
        INSERT l'enfant ($COM_ID = ?, BILLET_ID = ?, COM_AUTEUR = ?, COM_CONTENU = ?, $PARENT_ID = $COM_ID, $GAUCHE = 2, $DROITE = 3, $DEPTH = $DEPTHPARENT+1) // voir $depth
        }

        elseif (ajout d un frere de profondeur 1){
            UPDATE le parent ($GAUCHE = 1, $DROITE = $DROITELUIMEME+2, $DEPTH = $DEPTH+1) ou $depth = 1 ?

            if (ajout d'un frère ainé{
            UPDATE le 1er frère ajouté ($GAUCHE = $GAUCHELUIMEME +2 et $DROITE = $DROITELUIMEME +2)
            INSERT le frere ainé ($GAUCHE = 2, $DROITE=3 $DEPTH=1)
            }
            else (ajout d'un frère cadet de profondeur 1){
            INSERT le frère cadet ($GAUCHE = $GAUCHE1erFRERE +3 et $DROITE = $DROIE1erfrere +3)
            }
        }

        elseif (ajout du 1er enfant de profondeur 2{
        UPDATE le grand parent ($DROITE = $DROITELUIMEME+2)
        UPDATE le parent ($DROITE = $DROITE+2)

            if le 1er enfant de niveau 2{
            INSERT l'enfant ($COM_ID = ?, BILLET_ID = ?, COM_AUTEUR = ?, COM_CONTENU = ?, $PARENT_ID = $COM_ID, $GAUCHE = 3, $DROITE = 4, $DEPTH = $DEPTHPARENT+1) // voir $depth
            }

            elseif (ajout d un frere de profondeur 2){

                if (ajout d'un frère ainé{
                UPDATE le 1er frère ajouté ($GAUCHE = $GAUCHELUIMEME +2 et $DROITE = $DROITELUIMEME +2)
                INSERT le frere ainé ($GAUCHE = 2, $DROITE=3 $DEPTH=1)
                }
                else (ajout d'un frère cadet de profondeur 1){
                INSERT le frère cadet ($GAUCHE = $GAUCHE1erFRERE +3 et $DROITE = $DROIE1erfrere +3)
                }
            }
        }

    }
*/


// supprime un commentaire
    public function supprimerCommentaire()
    {

    }

   // signaler un commentaire

    public function signalerCommentaire()
    {

    }


}