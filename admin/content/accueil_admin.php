<?php
require ('src/php/utils/check_connection.php');

if (isset($_SESSION['utilisateur'])) {
    echo "<br>Bonjour " . $_SESSION['utilisateur']['nom'] . "<br>";
} else {
    echo "<br>Utilisateur non connecté.<br>";
}
