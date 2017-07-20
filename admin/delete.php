<?php require 'include/connexion.php'; ?>

<?php 
if ($_POST) {
	foreach ($_POST as $key => $value) {
		$_POST[$key] = addslashes($_POST[$key]);
	}

	if ( isset($_POST['supprimer_user']) ) {
		$delete = $pdoCV ->query("DELETE FROM ".$_POST['table']." WHERE utilisateur_id = '" . $_POST['valeurs'] . "'");
	}
	else{
		$delete = $pdoCV ->query("DELETE FROM ".$_POST['table']." WHERE id_".$_POST['table']." = '" . $_POST['valeurs'] . "'");
		// var_dump($delete);
	}

}

 ?>