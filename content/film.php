<?php
//require_once 'config.php'; // Inclure la connexion à la base de données
$filmDAO = new FilmDAO($cnx);
$films = $filmDAO->getFilms();
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
                        <td><?php echo htmlspecialchars($film->nom_studio); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucun film trouvé.</p>
    <?php endif; ?>

</body>
</html>
