<?php
$pays= new PaysDAO($cnx);
$liste = $pays->getPays();

for ($i = 0; $i < count($liste); $i++) {
    ?>
    <option value="<?php print $liste[$i]->id_pays; ?>">
        <?php print ($liste[$i]->nom_pays); ?>
    </option>
    <?php
}