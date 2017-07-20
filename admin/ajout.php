<?php require 'include/connexion.php'; ?>
<?php 

// var_dump($_POST);

foreach ($_POST['valeurs'] as $key => $value) {
	$_POST['valeurs'][$key] = addslashes($_POST['valeurs'][$key]);
}

// Insertion POST. On utilise DESCRIBE pour récupérer les champs nécéssaires a l'insertion, puis on utilise les valeurs envoyées en AJAX via $_POST 
if ($_POST) {
	if ($_POST['table'] != 'utilisateurs') { // On évite de se faire pirater
		$requete = "";
		$requete .= "INSERT INTO `".$_POST['table']."` (";
		for ($i=1; $i < count($_POST['champs']) ; $i++) {
			if ($i == count($_POST['champs'])-1) {
				$requete.= "`".$_POST['champs'][$i]."` ";
			}
			else{
				$requete.= "`".$_POST['champs'][$i]."`, ";
			}
		}
		$requete .= ") VALUES (";
		for ($i=1; $i < count($_POST['valeurs']) ; $i++) {
			if ($i == count($_POST['valeurs'])-1 ) {
				$requete .= "'".$_POST['valeurs'][$i]."' ";
			}
			else{
				$requete .= "'".$_POST['valeurs'][$i]."', ";
			}
		}
		$requete .=")";
		$requete = $pdoCV->query("$requete");



		$last_id = $pdoCV->lastInsertId();
		$recup = $pdoCV->query("SELECT * FROM ".$_POST['table']." WHERE ".$_POST['champs'][0]." = '" . $last_id . "' ");
		$recup = $recup->fetch();
	}
}

echo json_encode($recup);

 ?>