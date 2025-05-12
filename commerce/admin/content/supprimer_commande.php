<?php

if (isset($_POST['id_commande'])) {
    $id = $_POST['id_commande'];
    $commandeDAO = new CommandeDAO($cnx);
    $result = $commandeDAO->deleteCommande($id);

    if ($result) {
        header("Location: index_.php?=liste_commandes.php");
    } else {
        echo "Erreur lors de la suppression.";
    }
}