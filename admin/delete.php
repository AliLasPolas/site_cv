<?php require 'include/connexion.php'; ?>

<?php 

$contenu_table = "";

if ($_POST) {
	$delete = $pdoCV ->query("DELETE FROM competences WHERE id_competence = '" . $_POST['id_competence'] . "'");

	$competences = $pdoCV->query("SELECT * FROM competences WHERE utilisateur_id = '1' ");
	$competences = $competences->fetchAll();
	foreach ($competences as $competence) {
		$contenu_table .= '<tr><td class="competence">';
		$contenu_table .= $competence['competence'];
		$contenu_table .= '</td><td><span class="supprimer glyphicon glyphicon-remove"><div class="hidden">';
		$contenu_table .= $competence['id_competence'];
		$contenu_table .= '</div></span></td></tr>';
	}

	echo $_POST['id_competence'];
}


 ?>