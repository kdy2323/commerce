<?php
if (!isset($_SESSION['client'])) {
    header("Location: login_client.php");
    exit();
}

if (isset($_POST['film_id'])) {
    echo "ok";
    $film_id = $_POST['film_id'];
    $titre = $_POST['titre'];
    $prix = $_POST['prix'];

    // Initialisation du panier s'il n'existe pas
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    // Ajout du film au panier
    $_SESSION['panier'][] = [
        'id' => $film_id,
        'titre' => $titre,
        'prix' => $prix
    ];
}

// Redirection vers le panier
header("Location: index_.php?page=panier.php");
exit();
