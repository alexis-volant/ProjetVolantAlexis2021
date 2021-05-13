<?php

class PiloteBD extends Pilote
{

    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    { // $cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function updatePilote($champ, $id, $valeur)
    {
        try {
            $query = "update pilote set " . $champ . "='" . $valeur . "' Where idpilote= '" . $id . "'";
            $_resultset = $this->_db->prepare($query);
            $_resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function deletePilote($idpilote)
    {
        try {
            $query = "DELETE FROM pilote WHERE idpilote= :idpilote";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':idpilote', $idpilote);
            $_resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function ajoutPilote($idpilote,$abrv,$nompilote,$prenom,$nationalite,$participationgp,$poleposition,$podium,$victoire,$titrechampion,$photo,$idecurie){
        try{
            $query = "select ajoutpilote(:idpilote,:abrv,:nompilote,:prenom,:nationalite,:participationgp,:poleposition,:podium,:victoire,:titrechampion,:photo,:idecurie) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':idpilote',$idpilote);
            $_resultset->bindValue(':abrv',$abrv);
            $_resultset->bindValue(':nompilote',$nompilote);
            $_resultset->bindValue(':prenom',$prenom);
            $_resultset->bindValue(':nationalite',$nationalite);
            $_resultset->bindValue(':participationgp',$participationgp);
            $_resultset->bindValue(':poleposition',$poleposition);
            $_resultset->bindValue(':podium',$podium);
            $_resultset->bindValue(':victoire',$victoire);
            $_resultset->bindValue(':titrechampion',$titrechampion);
            $_resultset->bindValue(':photo',$photo);
            $_resultset->bindValue(':idecurie',$idecurie);
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);
            //var_dump($retour);
            return $retour;
        }catch(PDOException $e){
            print "Echec de la requete".$e->getMessage();
        }
    }

    public function getPilote()
    {
        $query = "SELECT * FROM pilote";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while ($d = $_resultset->fetch()) {
            $_data[] = new Pilote($d);
        }
        //var_dump($_data);
        return $_data;

        //$_data = $_resultset->fetchAll();
        //var_dump($_data);
    }

    public function getPiloteOrder()
    {
        $query = "SELECT * FROM pilote order by idecurie, victoire desc";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while ($d = $_resultset->fetch()) {
            $_data[] = new Pilote($d);
        }
        //var_dump($_data);
        return $_data;

        //$_data = $_resultset->fetchAll();
        //var_dump($_data);
    }



    public function getPiloteByid($idpilote)
    {
        try {
            $query = "select * from pilote where idpilote = :idpilote";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':idpilote', $idpilote);
            $_resultset->execute();

            while ($d = $_resultset->fetch()) {
                $_data[] = new Pilote($d);
            }
            return $_data;
        } catch (PDOException $e) {
            print 'Echec de la requete' . $e->getMessage();
        }
    }

    public function getPiloteByEcu($idecurie){
        try{
            $query="select * from pilote where idecurie = :idecurie";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':idecurie',$idecurie);
            $_resultset->execute();


            while($d = $_resultset->fetch()){
                $_data[] = new Pilote($d);
            }

                return $_data;


        }catch(PDOException $e){
            print 'Echec de la requete'.$e->getMessage();
        }
    }


    //Spécial AJAX
    public function getPiloteAjax($idpilote)
    {
        try {
            $this->_db->beginTransaction();
            $query = "select * from pilote where idpilote = :idpilote";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':idpilote', $idpilote);
            $resultset->execute();
            $data = $resultset->fetch();
            return $data;
//renvoyer un objet nécéssite adaptation dans ajax pour retour json
// donc retourner objet simple, qui sera stocké dans un élément de tableau json

            $this->_db->commit();


        } catch (PDOException $e) {
            print "Echec de la requête : " . $e->getMessage();
            $_db->rollback();


        }

    }
}