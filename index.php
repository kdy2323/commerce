<?php
session_start();
include('./admin/src/php/utils/header.php');
include('./admin/src/php/utils/all_includes.php');
?>

<!doctype html>
<html>
<head>
    <title><?php print $title; ?></title>
</head>

<body>
<div id="page" class="container">
    <header class="img_header"></header>
    <section id=" ">
        <nav>
            *** Menu ici ***
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
        <span class="text-muted">Mission 2025</span>
    </div>
</footer>
</body>
</html>
