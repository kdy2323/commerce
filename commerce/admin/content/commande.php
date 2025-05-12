<?php

// Vérifie que l'utilisateur est connecté
if (!isset($_SESSION['client'])) {
    header("Location: login_client.php");
    exit();
}

// Vérifie que toutes les données nécessaires sont présentes
if (isset($_POST['produit_id'], $_POST['nom'])) {
    $id_produit = $_POST['produit_id'];
    $nom_client = $_SESSION['client'];
    $quantite = $_POST['quantite'] ?? 1; // Valeur par défaut de 1 si non spécifiée

    // Instancier le DAO et appeler la fonction
    $commandeDAO = new CommandeDAO($cnx);
    $result = $commandeDAO->ajout_commande($id_produit, $nom_client, $quantite);
    
    if ($result > 0) {
        echo "Commande ajoutée avec succès (ID commande : $result)";
        header("Location: index_.php?page=panier.php");
        exit();
    } else {
        echo "Erreur lors de l'ajout de la commande.";
    }
} else {
    echo "Données de commande incomplètes.";
}
?>
