<?php
if (!isset($_SESSION['client'])) {
    header("Location: login_client.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_film'])) {
    $film_id = $_POST['id_film'];
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
    print_r($_SESSION['panier']);
}

// Redirection vers le panier
//header("Location: index_.php?page=panier.php");
exit();
