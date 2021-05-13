<?php

class EcurieBD extends Ecurie {

    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx){ // $cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function getEcurie(){
        $query="SELECT * FROM ecurie";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while($d = $_resultset->fetch()){
            $_data[] =  new Ecurie($d);
        }
        //var_dump($_data);
        return $_data;

        //$_data = $_resultset->fetchAll();
        //var_dump($_data);
    }


    public function getEcurieOrder(){
        $query="SELECT * FROM ecurie order by idecurie";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while($d = $_resultset->fetch()){
            $_data[] =  new Ecurie($d);
        }
        //var_dump($_data);
        return $_data;

        //$_data = $_resultset->fetchAll();
        //var_dump($_data);
    }

    public function getEcurieByid($idecurie){
        try{
            $query="select * from ecurie where idecurie = :idecurie";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':idecurie',$idecurie);
            $_resultset->execute();

            while($d = $_resultset->fetch()){
                $_data[] = new Ecurie($d);
            }
            return $_data;
        }catch(PDOException $e){
            print 'Echec de la requete'.$e->getMessage();
        }
    }

    public function getEcurieByPilote($idpilote){
        try{
            $query="select * from ecurie where idecurie=(select idecurie from pilote where idpilote= :idpilote)";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':idpilote',$idpilote);
            $_resultset->execute();

            while($d = $_resultset->fetch()){
                $_data[] = new Ecurie($d);
            }
            return $_data;
        }catch(PDOException $e){
            print 'Echec de la requete'.$e->getMessage();
        }
    }





}