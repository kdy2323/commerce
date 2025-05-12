<?php

$commandeDAO = new CommandeDAO($cnx);
$commandes = $commandeDAO->getAllCommandes();
?>

<h2>Liste des commandes clients</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>ID Commande</th>
        <th>Client</th>
        <th>Date</th>
        <th>Produit</th>
        <th>Quantité</th>
        <th>Prix unitaire (€)</th>
        <th>Total (€)</th>
    </tr>
    <?php foreach ($commandes as $commande): ?>
        <tr>
            <td><?= $commande['id_commande'] ?></td>
            <td><?= htmlspecialchars($commande['nom_client']) ?></td>
            <td><?= $commande['date_commande'] ?></td>
            <td><?= htmlspecialchars($commande['nom_produit']) ?></td>
            <td><?= $commande['quantite'] ?></td>
            <td><?= number_format($commande['prix_produit'], 2) ?></td>
            <td><?= number_format($commande['quantite'] * $commande['prix_produit'], 2) ?></td>
            <td>
                <form method="post" action="index_.php?page=supprimer_commande.php" onsubmit="return confirm('Confirmer la suppression ?');">
                    <input type="hidden" name="id_commande" value="<?= $commande['id_commande'] ?>">
                    <input type="submit" value="Supprimer">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
