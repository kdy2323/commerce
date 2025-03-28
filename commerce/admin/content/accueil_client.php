<?php
//session_start();
//require_once "FilmDAO.php";

if (!isset($_SESSION['client'])) {
    header("Location: login_client.php"); // Redirection si non connecté
    exit();
}

$filmDAO = new FilmDAO($cnx);
$films = $filmDAO->getFilm();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Client</title>
    <link rel="stylesheet" href="/admin/assets/css/style.css"> <!-- Ajoute un fichier CSS pour le design -->
</head>
<body>

<h2>Bienvenue, <?php echo htmlspecialchars($_SESSION['client']); ?> !</h2>

<h3>Liste des Films Disponibles</h3>
<div class="film-container">
    <?php if (!empty($films)): ?>
        <?php foreach ($films as $film): ?>
            <div class="film-card">
                <?php
                    print "<h4>" . $film->titre . "</h4>";
                    print "<p>Genre : " . $film->genre . "</p>";
                    print "<p>Date de sortie : " . $film->date_sortie . "</p>";
                    print "<p>Année de sortie : " . $film->annee . "</p>";
                    print "<p>Durée : " . $film->duree . " minutes</p>";
                    print "<p>Synopsie : " . $film->synopsis . "</p>";
                    print "<p>Prix : " . $film->prix . " €</p>";
                ?>
                <form action="index_.php?page=commande.php" method="post">
                    <input type="hidden" name="film_id" value="<?php echo $film->id_film; ?>">
                    <input type="hidden" name="titre" value="<?php echo $film->titre; ?>">
                    <input type="hidden" name="prix" value="<?php echo $film->prix; ?>">
                    <button type="submit">Commander</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun film disponible pour le moment.</p>
    <?php endif; ?>
</div>

</body>
</html>
