<?php require 'include/connexion.php'; ?>
<?php 

if ($_POST) {
	$pdoCV->query("INSERT INTO `competences` (`id_competence`, `competence`, `utilisateur_id`) VALUES (NULL, '". $_POST['id_ajout'] ."', '1')");
	$last_id = $pdoCV->lastInsertId();
	$requete = $pdoCV->query("SELECT * FROM competences WHERE id_competence = '" . $last_id . "' ");
	$requete = $requete->fetch();
}

var_dump($requete);
//echo json_encode($requete);

 ?>