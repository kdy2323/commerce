<?php

class CommandeDAO
{
    private $_bd;
    private $_array = array();

    public function __construct($cnx)
    {
        $this->_bd = $cnx;
    }

    public function getCommande()
    {
        $query = "select * from commande";
        try {
            $this->_bd->beginTransaction();
            $resultset = $this->_bd->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();
            foreach ($data as $d) {
                $_array[] = new Commande($d);
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
    public function ajout_commande($id_produit, $nom_client, $quantite)
    {
        $query = "select ajout_commande(:id_produit, :nom_client, :quantite)";
        try {
            $this->_bd->beginTransaction();
            $stmt = $this->_bd->prepare($query);
            $stmt->bindParam(':id_produit', $id_produit);
            $stmt->bindParam(':nom_client', $nom_client);
            $stmt->bindParam(':quantite', $quantite);
            $stmt->execute();
            $retour = $stmt->fetchColumn(0);
            $this->_bd->commit();
            if($retour == -1){
                return -1;
            }
            return $retour;
        } catch (PDOException $e) {
            $this->_bd->rollBack();
            print "Echec : " . $e->getMessage();
        }
    }
    public function getCommandesByClient($nom_client)
{
    $query = "SELECT c.*, p.nom_produit, p.prix_produit
              FROM commande c
              JOIN produit p ON c.id_produit = p.id_produit
              WHERE c.nom_client = :nom_client
              ORDER BY c.date_commande DESC";

    try {
        $resultset = $this->_bd->prepare($query);
        $resultset->bindParam(':nom_client', $nom_client, PDO::PARAM_STR);
        $resultset->execute();
        $data = $resultset->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        print "Erreur : " . $e->getMessage();
        return [];
    }
}
public function getAllCommandes()
{
    $query = "SELECT c.id_commande, c.nom_client, c.date_commande, c.quantite, 
                     p.nom_produit, p.prix_produit
              FROM commande c
              JOIN produit p ON c.id_produit = p.id_produit
              ORDER BY c.date_commande DESC";
    try {
        $stmt = $this->_bd->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur DAO commandes : " . $e->getMessage();
        return null;
    }
}
public function deleteCommande($id_commande)
{
    $query = "SELECT supprime_commande(:id_commande)";
    try {
        $this->_bd->beginTransaction();
        $stmt = $this->_bd->prepare($query);
        $stmt->bindParam(':id_commande', $id_commande, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        $this->_bd->commit();
        return $result; // TRUE ou FALSE
    } catch (PDOException $e) {
        $this->_bd->rollBack();
        print "Erreur : " . $e->getMessage();
        return false;
    }
}

}