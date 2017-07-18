<!-- Affichage des titres et noms ainsi que du nombre d'infos sur la page-->
	<?php 
		if (loggedIn()==false  ) {
			header("location:/site_cv/admin/index_admin.php");
		}
		$noms = $pdoCV->query("SELECT * FROM utilisateurs WHERE utilisateur_id = '".$_SESSION['membre']['utilisateur_id']."' ");
		$noms = $noms->fetch();


		if ( admin() ) {
			$infos = $pdoCV->query("SELECT * FROM ".$entetes." ");
		}
		else{
			$infos = $pdoCV->query("SELECT * FROM ".$entetes." WHERE utilisateur_id = '".$_SESSION['membre']['utilisateur_id']."' ");
		}
		$infos = $infos->fetchAll();
		$nomsInfos = $pdoCV->query("DESCRIBE ".$entetes."");
		$nomsInfos = $nomsInfos->fetchAll();

	 ?>

	<div class="hidden table_bdd"><?= $entetes; ?></div>
 	<h1> <?php echo strtoupper($entetes); ?> </h1>
 	<h3> <?php echo 'Le cv de ' . $noms['prenom'] . ' contient <span id="compte">' . count($infos) . ' </span>'.$entetes.' ' ?> </h2>
 	
 	<div class="validation">
 		<div class="alert alert-info"> Appuyez sur la croix pour supprimer une info ou sur le plus pour en ajouter une. Cliquez sur une information pour la modifier. </div>
 	</div>
 	<?php 
 	// echo "<br>";
 	// print_r($nomsInfos);
 	// echo "<br>";
 	?>
 	<a class="supprimer_tout">Supprimer toutes les infos</a>
	<table class="table table-striped">
		<thead class="thead-inverse">
			<tr>
			<!-- Boucle for qui récupère les noms de champs et les affiche -->
				<?php 
				for ($i=0; $i < count($nomsInfos); $i++) { 
					if ($i == 0 || $i == (count($nomsInfos)-1 ) ) {
						echo "<th>".$nomsInfos[$i][0]."</th>";
					}
					else{
						echo "<th>".$nomsInfos[$i][0]."</th>";
					}
				}
				?>				
				<th>Action</td>
			</tr>
		</thead>
		<tbody>
		<!-- Boucle for qui récupère les informations dans la table et les affiche sous forme de tableau. Une classe est appliquée chaque élément par rapport au nom du champ -->
			<?php
			// echo count($infos[0]); 
			for ($i=0; $i < count($infos); $i++) { 
					echo '<tr class="tr_' .$entetes .'">';
					for ($j=0; $j < count($infos[0])/2; $j++) {
						echo '<td class="case_'.$nomsInfos[$j][0].'"><p class="texte_'.$nomsInfos[$j][0].'">' . $infos[$i][$j] . '</p><input class="modification hidden" type="text" name="text" value="' . $infos[$i][$j]. '"></td>';
						
					}
					// Icone utilisée pour le JS
					echo '<td class="td_suppression"><span id="'.$infos[$i][0].'" class="supprimer glyphicon glyphicon-remove"></span></td></tr>';
					//Info [$i][0] est invariablement la primary key de la ligne, c'est pourquoi on la récupère pour faciliter la suppression en JS/Ajax ensuite
				}
			 ?>
			<!-- Création d'une boucle for les input, ajoute a l'input un id du nom du champ pour la récupération en JS -->
			<?php 
			if ($entetes != 'utilisateurs') {
				echo '<tr class="ajout">';
					for ($i=0; $i < count($nomsInfos); $i++) { 
						if ($entete != 'utilisateur' &&  $i == (count($nomsInfos)-1 ) ){
							echo '<td><input type="text" name="ajout" class="ajout" id="'.$nomsInfos[$i][0].'" placeholder="Fixe" disabled></td>';
						}
						elseif ($i == 0) 
						{
							echo '<td><input type="text" name="ajout" class="ajout" id="'.$nomsInfos[$i][0].'" placeholder="Fixe" disabled></td>';
						}
						else{
							echo '<td><input type="text" name="ajout" class="ajout" id="'.$nomsInfos[$i][0].'" placeholder="Ajout de '.$nomsInfos[$i][0].'"></td>';
						}
					}
					echo '<td><span class="ajout glyphicon glyphicon-plus"></span><td>';
				echo "</tr>";
			}
			?>
		</tbody>
	</table>

	<textarea id="ck" name="ck" class="ck"></textarea>
	<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
	<script type="text/javascript">
		CKEDITOR.replace( 'ck' );
	</script>

 </div>