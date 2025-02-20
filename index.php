<?php
session_start();
include('./admin/src/php/utils/header.php');
include('./admin/src/php/utils/all_includes.php');
?>

<!doctype html>
<html>
<head>
    <title><?php print $title; ?></title>
<<<<<<< HEAD
=======
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
>>>>>>> 759c3c7 (2eme commit)
</head>

<body>
<div id="page" class="container">
    <header class="img_header"></header>
    <section id=" ">
        <nav>
<<<<<<< HEAD
            *** Menu ici ***
=======
            <?php
            include('./admin/src/php/utils/public_menu.php');
            ?>
>>>>>>> 759c3c7 (2eme commit)
        </nav>
    </section>
    <section id="contenu">
        <div class="container">
            <?php
            include('./content/'.$page);
            ?>
        </div>
    </section>

</div>
<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
<<<<<<< HEAD
        <span class="text-muted">Mission 2025</span>
=======
        <span class="text-muted"> Cinéma Tom & Jerry </span>
>>>>>>> 759c3c7 (2eme commit)
    </div>
</footer>
</body>
</html>
