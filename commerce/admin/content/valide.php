<?php
// Vérifier si le client est connecté
if (!isset($_SESSION['client'])) {
    header("Location: login_client.php");
    exit();
}

// Vérifier si le panier existe et n'est pas vide
$panier = $_SESSION['panier'] ?? [];

if (empty($panier)) {
    $message = "Votre panier est vide. Aucune commande à valider.";
} else {
    // Ici, vous pourriez insérer la commande dans une base de données (optionnel)
    // Vider le panier après validation
    $message = "Merci pour votre commande ! Elle a bien été enregistrée.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Validation de la commande</title>
</head>
<body>

<h2>Validation de la commande</h2>

<p><?php echo $message; ?></p>

<a href="index_.php?page=accueil_client.php">Retour à l'accueil</a>

</body>
</html>
