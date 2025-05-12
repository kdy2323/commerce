<head>
    <link rel="stylesheet" href="/admin/assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index_.php?page=accueil.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index_.php?page=categorie.php">Categorie</a>
                </li>
            </ul>
            <div class="ms-auto p-2">
                <a href="index_.php?page=login_admin.php">Connexion Administrateur</a>
            </div>
            <div class="ms-auto p-2">
                <a href="index_.php?page=login_client.php">Connexion Client</a>
            </div>

            <form id="searchForm" class="d-flex" role="search">
                <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="button" id="searchButton">Search</button>
            </form>
        </div>
    </div>
</nav>
<script src="/admin/assets/js/fonctionsJ.js"></script>
