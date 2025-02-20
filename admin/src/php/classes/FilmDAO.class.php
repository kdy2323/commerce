<?php
class FilmDAO {
    private $cnx;

    public function __construct($cnx) {
        $this->cnx = $cnx;
    }

    public function getFilms() {
        $sql = "SELECT f.id_film, f.titre, f.date_sortie, s.nom_studio 
                FROM film f
                JOIN studio s ON f.id_studio = s.id_studio";
        $stmt = $this->cnx->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>
