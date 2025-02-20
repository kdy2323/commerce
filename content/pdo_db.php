<?php

$query = "select * from pays order by nom_pays";


$stmt = $cnx->query($query);
if($stmt->rowCount() > 0){
    while($result = $stmt->fetch()){
        echo $result['nom_pays']."<br>";
    }
}
/*
    try{
$stmt = $cnx->prepare($query);
$result = $stmt->fetchAll();
//var_dump($result);
foreach($result as $row){
    echo $row['nom_pays']."<br>";
}
}
catch(PDOException $e){
    print("Erreur d'insertion !: " . $e->getMessage() . "<br>");
}*/
$query = "select ajout_pays(:nom_pays)";
$stmt = $cnx->prepare($query);
$stmt->bindValue(':nom_pays', 'France');
$stmt->execute();
$id_pays = $stmt->fetchColumn(0);
print "<br>Dernier identification de pays ajouté : $id_pays<br>";

$query = "select * from pays order by nom_pays";

$stmt = $cnx->query($query);
if($stmt->rowCount() > 0){
    while($result = $stmt->fetch()){
        echo $result['nom_pays']."<br>";
    }
}