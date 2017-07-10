<?php require 'include/connexion.php'; ?>

<?php 

if ($_POST) {
	if ($_POST['table'] != 'utilisateurs') {//Histoire de pas avoir des admins qui apparaissent sur le site comme par magie
		$update = $pdoCV->query("UPDATE `".$_POST['table']."` SET `".$_POST['champ']."`= '" . $_POST['valeur'] . "' WHERE id_".$_POST['table']." = ".$_POST['id']." ");
	}
}

 ?>