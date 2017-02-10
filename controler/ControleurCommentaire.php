<?php

public function commenter($pseudo, $contenu, $idBillet) {
// Sauvegarde du commentaire
$this->commentaire->ajouterCommentaire($pseudo, $contenu, $idBillet);
// Actualisation de l'affichage du billet
$this->billet($idBillet);
}