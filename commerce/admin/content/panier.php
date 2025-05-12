<?php

$commandeDAO = new CommandeDAO($cnx);

$nom_client = $_SESSION['client'];
$commandes = $commandeDAO->getCommandesByClient($nom_client);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Panier</title>
    <link rel="stylesheet" href="/admin/assets/css/style.css">
</head>
<body>

<h2>Mon Panier - Commandes de <?php echo htmlspecialchars($nom_client); ?></h2>

<?php if (!empty($commandes)): ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID Commande</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Prix total</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($commandes as $cmd): ?>
            <tr>
                <td><?php echo $cmd['id_commande']; ?></td>
                <td><?php echo htmlspecialchars($cmd['nom_produit']); ?></td>
                <td><?php echo $cmd['quantite']; ?></td>
                <td><?php echo number_format($cmd['prix_produit'], 2); ?> €</td>
                <td><?php echo number_format($cmd['quantite'] * $cmd['prix_produit'], 2); ?> €</td>
                <td><?php echo $cmd['date_commande']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucune commande passée.</p>
<?php endif; ?>

</body>
</html>
