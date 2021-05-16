<?php


class CommentaireBD extends Commentaire {

    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx){ //$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function ajoutComm($pseudo,$comm,$id_ecurie){
        try{
            $query = "select ajoutcomm(:pseudo,:comm,:id_ecurie) as retour";
            $_resultset = $this->_db->prepare($query);

            $_resultset->bindValue(':pseudo',$pseudo);
            $_resultset->bindValue(':comm',$comm);
            $_resultset->bindValue(':id_ecurie',$id_ecurie);

            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);
            //var_dump($retour);
            return $retour;
        }catch(PDOException $e){
            print "Echec de la requete".$e->getMessage();
        }
    }

    public function deleteComm($id_comm)
    {
        try {
            $query = "select suppcomm(:id_comm)";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_comm', $id_comm);
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);
            return $retour;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function getComm(){
        $query="SELECT * FROM commentaire";
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

    public function getCommByEcurie($idecurie){
        try{
            $query="select * from commentaire where id_ecurie = :idecurie";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':idecurie',$idecurie);
            $_resultset->execute();


            while($d = $_resultset->fetch()){
                $_data[] = new Commentaire($d);
            }

            if(empty($_data)){

                $_data=[];
                return $_data;
            }
            else{
            return $_data; }


        }catch(PDOException $e){
            print 'Echec de la requete'.$e->getMessage();
        }
    }
}
