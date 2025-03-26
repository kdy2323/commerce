<a href="index.php?page=disconnect.php">Déconnexion</a>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?page=accueil_client.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=film.php">Films</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=reservations.php">Mes Réservations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=contact.php">Contact</a>
                </li>
            </ul>
            <!-- Formulaire de recherche -->
            <form class="d-flex" role="search" action="index.php?page=film.php" method="GET">
                <input class="form-control me-2" type="search" name="search" placeholder="Rechercher un film" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
            </form>
        </div>
    </div>
</nav>
