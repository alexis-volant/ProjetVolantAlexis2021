<?php

class PiloteBD extends Pilote {

    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx){ // $cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function getPilote(){
        $query="SELECT * FROM pilote";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while($d = $_resultset->fetch()){
            $_data[] =  new Pilote($d);
        }
        //var_dump($_data);
        return $_data;

        //$_data = $_resultset->fetchAll();
        //var_dump($_data);
    }

}