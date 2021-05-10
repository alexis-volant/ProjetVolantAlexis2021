<?php


class ClientBD extends Client {

    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx){ //$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function getClient($login, $password){
        try {

            $query = "select isclient(:login,:password) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':login', $login);
            $_resultset->bindValue(':password', md5($password));
            $_resultset->execute();

            //print "login=" .$login;
            //print "password=" .$password;

            $retour = $_resultset->fetchColumn(0);
            //var_dump($retour);
            return $retour;
        }catch(PDOException $e){
            print "Echec ".$e->getMessage();
        }
    }

    public function ajoutClient($nom,$prenom,$login,$pwd){
        try{
            $query = "select ajoutclient(:nom,:prenom,:login,:pwd) as retour";
            $_resultset = $this->_db->prepare($query);

            $_resultset->bindValue(':nom',$nom);
            $_resultset->bindValue(':prenom',$prenom);
            $_resultset->bindValue(':login',$login);
            $_resultset->bindValue(':pwd',$pwd);

            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);
            //var_dump($retour);
            return $retour;
        }catch(PDOException $e){
            print "Echec de la requete".$e->getMessage();
        }
    }
}
