<?php 

$hote='localhost'; // Le chelin vers le serveur
$bdd='site_cv_ali'; // Nom de la BDD
$utilisateur='root'; // Le nom d'utilisateur pour se connecter
$passe=''; // Mot de passe de l'utilisateur

$pdoCV= new PDO('mysql:host=' . $hote . ';dbname=' . $bdd, $utilisateur, $passe);

//$pdoCV est le nom de la variable de la connexion qui sert partout ou l'on doit se servir de cette connexion

$pdoCV->exec("SET NAMES utf8");

session_start();


//---------------------------------------
function loggedIn(){ // Cette fonction m'indique si le membre est connecté. (une fonction retourne toujours false par défaut)
	if (isset($_SESSION['membre'])) { // Si la session membre est non définie (elle ne peux etre que définie si nous sommes passés par la page de connexion avec le bon mdp)
		return true;
	}
	else{
		return false;
	}
}

//-----------------------------------
function admin(){ // Cette fonction m'indique si le membre est admin
	if (loggedIn() && $_SESSION['membre']['statut'] == 1) {// Si la session membre est définie, nous regardons si il est admin, c'est le cas, nous retournons true
		return true;
	}
	return false;
}


 ?>