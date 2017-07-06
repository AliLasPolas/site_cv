<?php require 'include/connexion.php'; ?>

<?php 


if ($_POST) {
	$delete = $pdoCV ->query("DELETE FROM competences WHERE id_competence = '" . $_POST['id_info'] . "'");

	$infos = $pdoCV->query("SELECT * FROM competences WHERE utilisateur_id = '1' ");
	$infos = $infos->fetchAll();

	echo $_POST['id'];
}


 ?>