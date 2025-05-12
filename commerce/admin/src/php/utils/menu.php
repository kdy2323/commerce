<a href="index_.php?page=disconnect.php">Déconnexion</a>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['client'])): ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index_.php?page=accueil_client.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index_.php?page=panier.php">Mes Commandes</a>
                    </li>
                <?php elseif (isset($_SESSION['admin'])): ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index_.php?page=accueil_admin.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index_.php?page=liste_commande.php">Voir les Commandes</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index_.php?page=accueil.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index_.php?page=studio.php">Studio</a>
                    </li>
                    <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
                <?php endif; ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
                        -Plus-
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Contact</a></li>
                        <li><a class="dropdown-item" href="#">A propos</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">FAQ</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
        </div>
    </div>
</nav>