<?php
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit();
}

// Récupérer les studios
$studioDAO = new StudioDAO($cnx);
$studios = $studioDAO->getStudio();

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = $_POST['titre'];
    $date_sortie = $_POST['date_sortie'];
    $duree = $_POST['duree'];
    $synopsis = $_POST['synopsis'];
    $id_studio = $_POST['id_studio'];
    $prix = $_POST['prix'];
    $genre = $_POST['genre'];

    if ($titre && $date_sortie && $duree && $synopsis && $id_studio && $prix && $genre) {
        $filmDAO = new FilmDAO($cnx);

        $id_film = $filmDAO->ajouterFilm($titre, $date_sortie, $duree, $synopsis, $id_studio, $prix, $genre);

        if ($id_film) {
            $message = "🎬 Film ajouté avec succès ! (ID = $id_film)";

        } else {
            $message = "❌ Erreur lors de l’ajout du film.";
        }
    } else {
        $message = "⚠️ Tous les champs sont obligatoires.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout d’un film</title>
</head>
<body>

<h2>Ajouter un film</h2>
<p><?= $message ?></p>

<form method="post">
    <label>Titre :</label><br>
    <input type="text" name="titre" required><br>

    <label>Date de sortie :</label><br>
    <input type="date" name="date_sortie" required><br>

    <label>Durée (en minutes) :</label><br>
    <input type="number" name="duree" required><br>

    <label>Synopsis :</label><br>
    <textarea name="synopsis" rows="4" cols="50" required></textarea><br>

    <label>Studio :</label><br>
    <select name="id_studio" required>
        <option value="">-- Sélectionner --</option>
        <?php foreach ($studios as $studio): ?>
            <option value="<?= $studio->id_studio ?>"><?= $studio->nom_studio ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Prix (€) :</label><br>
    <input type="number" name="prix" step="0.01" min="0" required><br>

    <label>Genre :</label><br>
    <input type="text" name="genre" required><br><br>

    <button type="submit">Ajouter le film</button>
</form>

<a href="index_.php?page=accueil_admin.php">⬅ Retour accueil admin</a>

</body>
</html>
