<?php
// Vérifier si le formulaire a été soumis
if (isset($_POST['reserver'])) {
    // Récupérer l'ID du film et de l'utilisateur
    $id_film = $_POST['id_film'];
    $id_utilisateur = $_SESSION['utilisateur']['id'];  // ID de l'utilisateur connecté

    // Vérifier que l'utilisateur est connecté
    if (isset($id_utilisateur)) {
        // Connexion à la base de données
        $filmDAO = new FilmDAO($cnx);
        $reservationDAO = new ReservationDAO($cnx);

        // Appel de la méthode pour réserver le film
        if ($reservationDAO->reserverFilm($id_utilisateur, $id_film)) {
            echo "Réservation réussie!";
        } else {
            echo "Erreur lors de la réservation.";
        }
    } else {
        echo "Veuillez vous connecter pour réserver un film.";
    }
}
?>
