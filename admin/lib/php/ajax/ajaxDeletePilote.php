<?php
header('Content-Type: application/json');
/*
 * Inclure les fichiers nécessaire à la communication avec la BD car on ne passe pas par la bd
 * Ce fichier est appelé par fonctions_jquery.js
 */
include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Pilote.class.php');
include ('../classes/PiloteBD.class.php');

$cnx = Connexion::getInstance($dsn,$user,$password);

$p = array();
$pilote = new PiloteBD($cnx);
extract($_GET,EXTR_OVERWRITE);
$p[] = $pilote->deletePilote($id);

// conversion du tableau php au format javascript

print json_encode($p);
