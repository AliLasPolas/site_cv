<?php require_once'../admin/include/connexion.php'; ?>
<?php 
$erreur = '';
if ($_POST) {
	if (isset($_POST['table'])) {
		foreach ($_POST as $key => $value) {
			$_POST[$key] = addslashes($_POST[$key]);
		}
		$selection = $pdoCV->query("SELECT * FROM ".$_POST['table']." WHERE id_".$_POST['table']." = ".$_POST['id']." ");
		$selection = $selection->fetch();
		echo json_encode($selection);
	}
	if(isset($_POST['pseudo_contact'])){
		// print_r($_POST);
		if (strlen($_POST['sujet_contact']) < 1 ) {
			$erreur .= 'Veuillez renseigner le sujet de votre message (messages d\'insultes bienvenus). <br>';
		}
		if (strlen($_POST['pseudo_contact']) < 3 ) {
			$erreur .= 'Pseudo incorrectement court. Veuillez allonger votre pseudonyme..<br>';
		}
		if ( !filter_var($_POST['email_contact'], FILTER_VALIDATE_EMAIL) ) {
			$erreur .= '<br>Adresse email non conforme. Veuillez vous conformer.<br>';
		}
		if (!empty($_POST['telephone_contact'])) {
			if (strlen($_POST['telephone_contact']) < 10 ) {
				$erreur .= 'Numéro de téléphone non valide . Vous n\'etes pas obligé de le renseigner. <br>';
			}
		}
		if (strlen($_POST['texte_contact']) < 15 ) {
			$erreur .= 'Message incorrectement court. Veuillez faire preuve d\'un minimum de verbiage. Lisez un peu Proust pour vous inspirer. <br>';
		}			
		if ($erreur == '') {
			foreach ($_POST as $key => $value) {
				$_POST[$key] = addslashes($_POST[$key]);
			}
			$insertion = $pdoCV->query("
				INSERT INTO 
				`contact`(
				`id_contact`, 
				`pseudo_contact`, 
				`email_contact`, 
				`telephone_contact`, 
				`sujet_contact`, 
				`texte_contact`
				) VALUES (
				NULL,
				'".$_POST['pseudo_contact']."',
				'".$_POST['email_contact']."',
				'".$_POST['telephone_contact']."',
				'".$_POST['sujet_contact']."',
				'".$_POST['texte_contact']."' )
				");
		}
		else{
			echo $erreur;
		}
	}
}

 ?>