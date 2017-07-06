<?php require_once'include/header.php'; ?>

<?php 

$noms = $pdoCV->query("SELECT * FROM utilisateurs WHERE id_utilisateur = '1' ");
$noms = $noms->fetch();

$loisirs = $pdoCV->query("SELECT * FROM loisirs WHERE utilisateur_id = '1' ");
$loisirs = $loisirs->fetchAll();


 ?>

 <div class="col-md-10">
 	<h1> LOISIRS </h1>
 	<h3> <?php echo 'Le cv de ' . $noms['prenom'] . ' contient <span id="compte">' . count($loisirs) . '</span> loisirs' ?> </h2>
 	<div class="validation">
 	<div class="alert alert-info"> Appuyez sur la croix pour supprimer une loisir ou sur le plus pour en ajouter une </div>
 	</div>
 	<a class="supprimer_tout">Supprimer toutes les loisirs</a>
	<table class="table table-striped">
		<thead class="thead-inverse">
			<tr>
				<th>loisir</td>
				<th>Supprimer</td>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach ($loisirs as $loisir) {
				echo '<tr class="tr_loisirs"><td class="loisir"><p class="loisirs">' . $loisir['loisir'] . '</p><input class="input_loisir hidden" type="text" name="text" id="'.$loisir['id_loisir'].'" value="' . $loisir['loisir'] . '"></td><td><span class="supprimer glyphicon glyphicon-remove
				"><div class="id hidden">' . $loisir['id_loisir'] . '</div></span></td></tr>';
			}
			 ?>
			<tr>
				<td><input type="text" name="ajout" id="ajout" placeholder="Ajout d'une loisir"></td>
				<td><span class="ajouter glyphicon glyphicon-plus"></span></td>
			</tr>
		</tbody>
	</table>
 </div>


<?php require_once'include/footer.php'; ?>