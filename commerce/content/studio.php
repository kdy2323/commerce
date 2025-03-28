<?php
$pays = new StudioDAO($cnx);
$liste = $pays->getStudio();

if(is_null($liste)){
    print "<br>Pas de données";
}
else {
    foreach ($liste as $studio) {
        print "<br>Studio : " . $studio->nom_studio . "<br>";
        print "Adresse : " . $studio->adresse . "<br>";
        
    }
}
