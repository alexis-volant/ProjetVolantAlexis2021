<?php

class ThemeBD extends Theme {

    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx){ // $cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function getTheme(){
        $query="SELECT * FROM bp_theme";
        $_resultset = $this->_db->query($query);
        $_data = $_resultset->fetchAll();
        var_dump($_data);
    }
}