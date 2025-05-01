<?php

class FilmDAO
{
    private $_bd;
    private $_array = array();

    public function __construct($cnx)
    {
        $this->_bd = $cnx;
    }

    public function getFilm()
    {
        $query = "select * from film";
        try {
            $this->_bd->beginTransaction();
            $resultset = $this->_bd->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();
            foreach ($data as $d) {
                $_array[] = new Film($d);
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
    public function ajouterFilm($titre, $date_sortie, $duree, $synopsis, $id_studio, $prix, $genre) {
        $query = "INSERT INTO film (titre, date_sortie, duree, synopsis, id_studio, prix, genre) 
                  VALUES (:titre, :date_sortie, :duree, :synopsis, :id_studio, :prix, :genre)";
        
        $stmt = $this->_bd->prepare($query);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':date_sortie', $date_sortie);
        $stmt->bindParam(':duree', $duree);
        $stmt->bindParam(':synopsis', $synopsis);
        $stmt->bindParam(':id_studio', $id_studio);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':genre', $genre);
    
        if ($stmt->execute()) {
    return $this->_bd->lastInsertId();
} else {
    print_r($stmt->errorInfo());
}

    
        return false;
    }
    
}