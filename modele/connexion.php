<?php

function chargerClasse($classname)
{
    require $classname . '.class.php';
}

spl_autoload_register('chargerClasse');

try {
    $db = new PDO('mysql:host=localhost;dbname=P3_blog; charset=utf8', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (Exception $e) {
    die ("Erreur de connexion à la base de donnée : " . $e->getMessage());
}

return $db; // vérifier !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

 // On émet une alerte à chaque fois qu'une requête a échoué.

$manager = new BilletsManager($db); // vérifier !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!