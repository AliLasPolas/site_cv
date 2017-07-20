<?php 

$hote='localhost'; // Le chelin vers le serveur
$bdd='site_cv_ali'; // Nom de la BDD
$utilisateur='root'; // Le nom d'utilisateur pour se connecter
$passe=''; // Mot de passe de l'utilisateur

$pdo = new PDO('mysql:host=' . $hote . ';dbname=' . $bdd, $utilisateur, $passe);


//$pdoCV est le nom de la variable de la connexion qui sert partout ou l'on doit se servir de cette connexion

$pdo->exec("SET NAMES utf8");


function connexion($tables){
	$hote='localhost'; // Le chelin vers le serveur
	$bdd='site_cv_ali'; // Nom de la BDD
	$utilisateur='root'; // Le nom d'utilisateur pour se connecter
	$passe=''; // Mot de passe de l'utilisateur

	$pdo = new PDO('mysql:host=' . $hote . ';dbname=' . $bdd, $utilisateur, $passe);


	//$pdoCV est le nom de la variable de la connexion qui sert partout ou l'on doit se servir de cette connexion

	$pdo->exec("SET NAMES utf8");

	if (gettype($tables) != 'array' ) {
		$tmp = $tables;
		settype($tables, 'array');
		$tables[0] = $tmp;
	}
	$requete_return;
	$requete_erreur = '';
	$requete = 'SELECT * FROM ';
	
	for ($i=0; $i < count($tables); $i++) { 
		$requete .= $tables[0];
		if ($i != (count($tables)-1) ) {
			$requete .= ',';
		}
	}

	$requete .= ' WHERE utilisateur_id = 1 ';
	$requete = $pdo->prepare($requete);
	$requete_query = $requete->execute();
	$requete_erreur = $requete_query->errorCode();
	$requete_nombre = $requete_query->rowCount();

	if ($requete_nombre == 0 ) {
		$requete_erreur .= $requete->debugDumpParams();
		$requete_erreur .= '<br>';
		$requete_erreur .= $requete_query->errorCode();
		$requete_return = $requete_erreur;
	}
	else{
		$requete_query = $requete_query->fetch_all();
		$requete_return = $requete_query;
	}

return $requete_return;
}
// $pdo = null;

 ?>