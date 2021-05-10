<?php
header('Content-Type: application/json');
/*
 * Inclure les fichiers nécessaire à la communication avec la BD car on ne passe pas par la bd
 * Ce fichier est appelé par fonctions_jquery.js
 */
include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Commentaire.class.php');
include ('../classes/CommentaireBD.class.php');

$cnx = Connexion::getInstance($dsn,$user,$password);

$c = array();
$com = new CommentaireBD($cnx);

extract($_POST,EXTR_OVERWRITE);
$c[] = $com->ajoutComm($pseudo,$comm,$id_ecurie);
// conversion du tableau php au format javascript

print json_encode($c);