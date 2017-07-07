 <?php require 'include/connexion.php'; ?>

<?php 

if ($_POST) {
	$update = $pdoCV->query("UPDATE `".$_POST['table']."` SET `".$_POST['champ']."`= '" . $_POST['valeur'] . "' WHERE id_".$_POST['table']." = ".$_POST['id']." ");
}

 ?>