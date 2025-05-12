<?php

header('Content-Type: application/json');
//chemin d'accès depuis le dossier ajax
require '../db/db_pg_connect.php';
require '../classes/Connection.class.php';
require '../classes/Produit.class.php';
require '../classes/ProduitDAO.class.php';
$cnx = Connection::getInstance($dsn, $user, $password);

$mission = new ProduitDAO($cnx);
$data = $mission->ajax_get_produit($_GET['nom_produit']);
print json_encode($data);