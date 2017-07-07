<?php require 'include/connexion.php'; ?>

<?php 


if ($_POST) {
	$delete = $pdoCV ->query("DELETE FROM ".$_POST['table']." WHERE id_".$_POST['table']." = '" . $_POST['valeurs'] . "'");
	var_dump($delete);

	// $infos = $pdoCV->query("SELECT * FROM ".$_POST['table']." WHERE utilisateur_id = '1' ");
	// $infos = $infos->fetchAll();

}


 ?>