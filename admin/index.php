<?php
session_start();
//INDEX ADMIN
include('./src/php/utils/header.php');
include('./src/php/utils/all_includes.php');
?>

<!doctype html>
<html>
<head>
    <title><?php print $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.min.js" integrity="sha256-AlTido85uXPlSyyaZNsjJXeCs07eSv3r43kyCVc8ChI=" crossorigin="anonymous"></script>
    <script src="./assets/js/fonctionsJqueryMission.js" defer></script>
</head>

<body>
<div id="page" class="container">
    <header class="img_header"></header>
    <section id=" ">
    <nav>
        <?php
        // Vérifier le rôle de l'utilisateur dans la session
        if (isset($_SESSION['utilisateur'])) {
            // Si l'utilisateur est un admin
            if ($_SESSION['utilisateur']['role'] === 'admin') {
                // Inclure le menu pour l'admin
                if (file_exists('src/php/utils/admin_menu.php')) {
                    include('src/php/utils/admin_menu.php');
                } else {
                    echo "<p>Menu Admin introuvable.</p>";
                }
            }
            // Si l'utilisateur est un client
            elseif ($_SESSION['utilisateur']['role'] === 'client') {
                // Inclure le menu pour le client
                if (file_exists('src/php/utils/client_menu.php')) {
                    include('src/php/utils/client_menu.php');
                } else {
                    echo "<p>Menu Client introuvable.</p>";
                }
            }
        } else {
            echo "<p>Utilisateur non connecté.</p>";
        }
        ?>
    </nav>
</section>

    <section id="contenu">
        <div class="container">
            <?php
            include('./content/'.$_SESSION['page']);
            ?>
        </div>
    </section>

</div>
<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">Cinéma 2025</span>
    </div>
</footer>
</body>
</html>


