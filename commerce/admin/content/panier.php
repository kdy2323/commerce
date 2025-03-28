<?php
if (!isset($_SESSION['user'])) {
    header("Location: login_client.php");
    exit();
}

$panier = $_SESSION['panier'] ?? [];
$total = 0;

// Vider le panier
if (isset($_POST['vider_panier'])) {
    $_SESSION['panier'] = [];
    header("Location: panier.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Panier</title>
</head>
<body>

<h2>Mon Panier</h2>

<?php if (!empty($panier)): ?>
    <table border="1">
        <tr>
            <th>Film</th>
            <th>Prix</th>
        </tr>
        <?php foreach ($panier as $film): ?>
            <tr>
                <td><?php echo htmlspecialchars($film->titre); ?></td>
                <td><?php echo number_format($film->prix, 2, ',', ' ') . " €"; ?></td>
            </tr>
            <?php $total += $film->prix; ?>
        <?php endforeach; ?>
        <tr>
            <td><strong>Total</strong></td>
            <td><strong><?php echo number_format($total, 2, ',', ' ') . " €"; ?></strong></td>
        </tr>
    </table>

    <form method="post">
        <button type="submit" name="vider_panier">Vider le panier</button>
    </form>
<?php else: ?>
    <p>Votre panier est vide.</p>
<?php endif; ?>

<a href="accueil_client.php">Retour à l'accueil</a>

</body>
</html>
