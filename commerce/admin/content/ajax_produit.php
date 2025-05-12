<?php
$prod = new ProduitDAO($cnx);
$liste_p = $prod->getProduit();
$nbr_p = count($liste_p);

?>

<div id="liste" class="container">
    <div class="row">
        <div class="col-md-3">Voitures<br><br>
        </div>
    </div>

    <?php
    for ($i = 0; $i < $nbr_p; $i++) {
        ?>
        <div class="row">
            <div class="col-md-3" id_prod="<?= $liste_p[$i]->id_produit; ?>">
                <?php
                    print $liste_p[$i]->nom_produit."<br><br>";
                ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<div class="container" id="produit">

</div>
