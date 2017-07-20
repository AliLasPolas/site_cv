<?php require 'include/connexion.php'; ?>
<?php 

if ($_POST) {
	foreach ($_POST as $key => $value) {
		$_POST[$key] = addslashes($_POST[$key]);
	}
	$pdoCV->query("DELETE FROM ".$_POST['table']." WHERE 1 = 1");
}

 ?>