 <?php require 'include/connexion.php'; ?>

<?php 

if ($_POST) {
	$update = $pdoCV->query("UPDATE `competences` SET `competence`= '" . $_POST['modif'] . "' WHERE id_competence = ".$_POST['id_modif']." ");
}

 ?>