<?php


if (!isset($_SESSION['client'])) {
    header("Location: login_client.php"); // Redirection si non connecté
    exit();
}

$produitDAO = new ProduitDAO($cnx);
$produits = $produitDAO->getProduit();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Client</title>
    <link rel="stylesheet" href="/admin/assets/css/style.css">
</head>
<body>

<h2>Bienvenue, <?php echo htmlspecialchars($_SESSION['client']); ?> !</h2>

<h3>Liste des Voitures Disponibles</h3>
<div class="film-container">
    <?php if (!empty($produits)): ?>
        <?php foreach ($produits as $produit): ?>
            <div class="produit-card">
                <?php
                    print "<h4>" . $produit->id_produit . "</h4>";
                    print "<h4>" . $produit->nom_produit . "</h4>";
                    print "<p>Genre : " . $produit->description . "</p>";
                    print "<p>Prix : " . $produit->prix_produit . " €</p>";
                    print "<p>Marque : " . $produit->nom_marque . "</p>";
                    echo "<img src='../" . htmlspecialchars($produit->image) . "' width='150'>";
                ?>
                <form action="index_.php?page=commande.php" method="post">
                    <input type="hidden" name="produit_id" value="<?php echo $produit->id_produit; ?>">
                    <input type="hidden" name="nom" value="<?php echo $produit->nom_produit; ?>">
                    <input type="number" name="quantite" min="1" value="1" required>
                    <button type="submit" name="commander">Commander</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucune voiture disponible pour le moment.</p>
    <?php endif; ?>
</div>

</body>
</html>
