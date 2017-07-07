<?php require 'include/connexion.php'; ?>
<?php 

if ($_POST) {
	$pdoCV->query("DELETE FROM ".$_POST['table']." WHERE 1 = 1");
}

 ?>