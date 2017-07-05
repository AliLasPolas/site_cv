<?php require 'include/connexion.php'; ?>
<?php 

if ($_POST) {
	$pdoCV->query("DELETE FROM competences WHERE 1 = 1");


}

 ?>