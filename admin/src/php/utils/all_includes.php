<?php

//Si on se trouve dans la partie admin
if (file_exists('./src/php/db/db_pg_connect.php')) {
    //…
} else {
    //si on se trouve dans la partie publique
    if (file_exists('./admin/src/php/db/db_pg_connect.php')) {
        require './admin/src/php/db/db_pg_connect.php';
        //CES LIGNES SERONT DEPLACEES DANS UNE CLASSE ULTERIEUREMENT
        $cnx = new PDO($dsn, $user, $password);
        if($cnx){
            print "Connection successful";
        }else {
            print "Connection error";
        }
    }
}
