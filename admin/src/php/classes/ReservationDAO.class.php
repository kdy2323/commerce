<?php

class ReservationDAO {
    private $_bd;

    public function __construct($cnx) {
        $this->_bd = $cnx;
    }

    // Méthode pour réserver un film
    public function reserverFilm($id_utilisateur, $id_film) {
        $query = "INSERT INTO reservations (id_utilisateur, id_film) VALUES (:id_utilisateur, :id_film)";
        try {
            $stmt = $this->_bd->prepare($query);
            $stmt->bindValue(':id_utilisateur', $id_utilisateur);
            $stmt->bindValue(':id_film', $id_film);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur de réservation : " . $e->getMessage();
            return false;
        }
    }

    // Méthode pour récupérer toutes les réservations d'un utilisateur
    public function getReservationsByUser($id_utilisateur) {
        $query = "SELECT film.titre, reservations.date_reservation 
                  FROM reservations 
                  JOIN film ON reservations.id_film = film.id_film 
                  WHERE reservations.id_utilisateur = :id_utilisateur";
        try {
            $stmt = $this->_bd->prepare($query);
            $stmt->bindValue(':id_utilisateur', $id_utilisateur);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur de récupération des réservations : " . $e->getMessage();
            return [];
        }
    }
}
