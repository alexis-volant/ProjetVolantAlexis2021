<?php
header('Content-Type: application/json');
/*
 * Inclure les fichiers nécessaire à la communication avec la BD car on ne passe pas par la bd
 * Ce fichier est appelé par fonctions_jquery.js
 */
include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Client.class.php');
include ('../classes/ClientBD.class.php');

$cnx = Connexion::getInstance($dsn,$user,$password);

$ins = array();
$client = new ClientBD($cnx);

extract($_POST,EXTR_OVERWRITE);
$ins[] = $client->ajoutClient($nom,$prenom,$login,$pwd);
// conversion du tableau php au format javascript

print json_encode($ins);
