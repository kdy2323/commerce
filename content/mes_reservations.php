<?php
// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['utilisateur'])) {
    $id_utilisateur = $_SESSION['utilisateur']['id'];
    $reservationDAO = new ReservationDAO($cnx);

    $reservations = $reservationDAO->getReservationsByUser($id_utilisateur);

    if (!empty($reservations)) {
        echo "<h2>Mes réservations</h2>";
        echo "<table>";
        echo "<tr><th>Titre</th><th>Date de réservation</th></tr>";
        foreach ($reservations as $reservation) {
            echo "<tr><td>" . htmlspecialchars($reservation['titre']) . "</td><td>" . htmlspecialchars($reservation['date_reservation']) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Aucune réservation trouvée.</p>";
    }
} else {
    echo "<p>Veuillez vous connecter pour voir vos réservations.</p>";
}
?>
