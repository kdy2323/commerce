<?php

// Par défaut, si aucun titre particulier n'est défini --> titre générique
$title = "Cinéma Tom And Jerry";

// Définition de la page à afficher et création de la variable de session
if(!isset($_SESSION['page'])){
    $_SESSION['page'] = "accueil.php";
}
if(isset($_GET['page'])){
    $_SESSION['page'] = $_GET['page'];
}

// Gestion des balises SEO par page
switch ($_SESSION['page']) {
    case "pdo_db.php":
        $title = "Cinéma Tom And Jerry ";
        // $canonical = "si nécessaire ... ";
        break;
}

// Vérifier si la page existe dans l'arborescence
if (!file_exists('./content/'.$_SESSION['page'])) {
    $title = "Page introuvable - Cinéma Tom And Jerry";
    $_SESSION['page'] = 'page404.php';
}

