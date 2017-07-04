<?php 

$hote='localhost'; // Le chelin vers le serveur
$bdd='site_cv_ali'; // Nom de la BDD
$utilisateur='root'; // Le nom d'utilisateur pour se connecter
$passe=''; // Mot de passe de l'utilisateur

$pdoCV= new PDO('mysql:host=' . $hote . ';dbname=' . $bdd, $utilisateur, $passe);

//$pdoCV est le nom de la variable de la connexion qui sert partout ou l'on doit se servir de cette connexion

$pdoCV->exec("SET NAMES utf8");
 ?>