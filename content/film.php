<?php
// Vérification de la recherche
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Connexion à la base de données et récupération des films
$filmDAO = new FilmDAO($cnx);

// Si une recherche est effectuée
if (!empty($search)) {
    // Recherche des films dont le titre contient la chaîne de recherche
    $films = $filmDAO->searchFilms($search);
} else {
    // Si aucune recherche, récupérer tous les films
    $films = $filmDAO->getFilm();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Films</title>
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers une feuille de style CSS -->
</head>
<body>

    <h1>Liste des Films</h1>

    <?php if (!empty($films)) : ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date de sortie</th>
                    <th>Studio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($films as $film) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($film->titre); ?></td>
                        <td><?php echo htmlspecialchars($film->date_sortie); ?></td>
                        <td><?php echo htmlspecialchars($film->synopsis); ?></td>
                        <td> <?php
                                echo "<form method='POST' action='index.php?page=reserver_film.php'>";
                                echo "<input type='hidden' name='id_film' value='" . $film->id_film . "'>";
                                echo "<button type='submit' name='reserver'>Réserver</button>";
                                echo "</form>";
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucun film trouvé.</p>
    <?php endif; ?>

</body>
</html>
