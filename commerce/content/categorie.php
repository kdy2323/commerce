<?php
$categorieDAO = new CategorieDAO($cnx);
$liste = $categorieDAO->getCategorie();

if (is_null($liste)) {
    print "<br>Pas de données";
} else {
    foreach ($liste as $categorie) {
        echo "<div class='categorie'>";
        echo "<h2>" . htmlspecialchars($categorie->nom_categorie). "</h2>";
        echo "<img src='" . htmlspecialchars($categorie->image_cat) . "' width='150'>";
        echo "</div>";
    }
}
?>
