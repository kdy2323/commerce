<?php

$produitDAO = new ProduitDAO($cnx);
$produits = $produitDAO->getProduit();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos voitures</title>
    <link rel="stylesheet" href="admin/assets/css/style_produits.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <h1 class="titre-page">Nos voitures disponibles</h1>
    <div class="produits-container">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($produits as $produit): ?>
                <tr class="ligne-produit">
                    <td><img src="<?= htmlspecialchars($produit->image) ?>" class="img-produit" alt="<?= htmlspecialchars($produit->nom_produit) ?>"></td>
                    <td><?= htmlspecialchars($produit->nom_produit) ?></td>
                    <td>
                        <span class="desc-courte"><?= substr($produit->description, 0, 2) ?>...</span>
                        <div class="desc-complete" style="display: none;"><?= htmlspecialchars($produit->description) ?></div>
                        <button class="btn-toggle-desc">Voir plus</button>
                    </td>
                    <td><?= number_format($produit->prix_produit, 2) ?> €</td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Filtres -->
<div class="filtres">
    <label for="filtre-categorie">Catégorie :</label>
    <select id="filtre-categorie">
        <option value="toutes">Toutes</option>
        <option value="1">Citadine</option>
        <option value="2">SUV</option>
        <option value="3">Berline</option>
    </select>

    <label for="filtre-prix">Prix max :</label>
    <input type="range" id="filtre-prix" min="10000" max="50000" step="1000" value="50000">
    <span id="valeur-prix">50000 €</span>
</div>


<script src="/admin/assets/js/fonctionsJ.js"></script>
</body>
</html>
