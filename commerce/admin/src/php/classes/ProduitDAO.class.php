<?php

class ProduitDAO
{
    private $_bd;
    private $_array = array();

    public function __construct($cnx)
    {
        $this->_bd = $cnx;
    }

    public function getProduit()
    {
        $query = "select * from produit";
        try {
            $this->_bd->beginTransaction();
            $resultset = $this->_bd->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();
            foreach ($data as $d) {
                $_array[] = new Produit($d);
            }
            if (!empty($_array)) {
                return $_array;
            } else {
                return null;
            }

            $this->_bd->commit();
        } catch (PDOException $e) {
            $this->_bd->rollback();
            print "Echec de la requête " . $e->getMessage();
        }
    }
    public function getProduitById($id_prod)
    {
        $query = "SELECT * FROM produit where id_produit=:id_prod";
        try {
            $resultset = $this->_bd->prepare($query);
            $resultset->bindValue(":id_prod", $id_prod);
            $resultset->execute();
            $_array = $resultset->fetchAll();
            if (!empty($_array)) {
                return $_array; 
            } else {
                return null;
            }
        } catch (PDOException $e) {
            print "Echec de la requête " . $e->getMessage();
        }
    }
    public function ajax_get_produit($nom)
    {
        $query = "select * from produit where nom_produit=:nom";
        try {
            $this->_bd->beginTransaction();
            $stmt = $this->_bd->prepare($query);
            $stmt->bindValue(':nom', $nom);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if($stmt->rowCount() > 0){
                return $result;
            }else {
                return null;
            }
            $this->_bd->commit();
        } catch (PDOException $e) {
            $this->_bd->rollBack();
            print $e->getMessage();
            return -1;
        }

    }
    
}