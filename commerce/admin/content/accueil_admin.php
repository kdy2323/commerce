<?php
require('src/php/utils/check_admin.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Tableau de bord</title>
    <link rel="stylesheet" href="/admin/assets/css/style.css">
</head>
<body>
    <div class="admin-container">
        <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['admin']); ?> 👋</h1>
        <p class="subtitle">Tableau de bord de l'administrateur</p>
    </div>
</body>
</html>
