<?php require_once'include/header.php'; ?>

<?php 

$noms = $pdoCV->query("SELECT * FROM utilisateurs WHERE id_utilisateur = '1' ");
$noms = $noms->fetch();

$competences = $pdoCV->query("SELECT * FROM competences WHERE utilisateur_id = '1' ");
$competences = $competences->fetchAll();

$entete = "competence";
$entetes = "competences";


 ?>

<div class="hidden table_bdd">competences</div>
 <div class="col-md-10">
 	<h1> COMPÉTENCES </h1>
 	<h3> <?php echo 'Le cv de ' . $noms['prenom'] . ' contient <span id="compte">' . count($competences) . '</span> compétences' ?> </h2>
 	<div class="validation">
 	<div class="alert alert-info"> Appuyez sur la croix pour supprimer une compétence ou sur le plus pour en ajouter une </div>
 	</div>
 	<a class="supprimer_tout">Supprimer toutes les compétences</a>
	<table class="table table-striped">
		<thead class="thead-inverse">
			<tr>
				<th>Compétence</td>
				<th>Supprimer</td>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach ($competences as $competence) {
				echo '<tr class="tr_' .$entetes .'"><td class="'.$entete.'"><p class="'.$entete.'">' . $competence['competence'] . '</p><input class="input_'. $entete. ' hidden" type="text" name="text" id="'.$competence['id_competence'].'" value="' . $competence['competence'] . '"></td><td><span class="supprimer glyphicon glyphicon-remove
				"><div class="id hidden">' . $competence['id_competence'] . '</div></span></td></tr>';
			}
			 ?>
			<tr>
				<td><input type="text" name="ajout" id="ajout" placeholder="Ajout d'une compétence"></td>
				<td><span class="ajouter glyphicon glyphicon-plus"></span></td>
			</tr>
		</tbody>
	</table>
 </div>


<?php require_once'include/footer.php'; ?>