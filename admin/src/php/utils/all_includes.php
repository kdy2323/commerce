<?php

//Si on se trouve dans la partie admin
if (file_exists('./src/php/db/db_pg_connect.php')) {
    //…
} else {
    //si on se trouve dans la partie publique
    if (file_exists('./admin/src/php/db/db_pg_connect.php')) {
        require './admin/src/php/db/db_pg_connect.php';
<<<<<<< HEAD
        //CES LIGNES SERONT DEPLACEES DANS UNE CLASSE ULTERIEUREMENT
        $cnx = new PDO($dsn, $user, $password);
        if($cnx){
            print "Connection successful";
        }else {
            print "Connection error";
        }
=======
        require './admin/src/php/classes/Autoloader.class.php';
        Autoloader::register();
        $cnx=Connection::getInstance($dsn,$user,$password);
>>>>>>> 759c3c7 (2eme commit)
    }
}
