<?php require_once'../admin/include/connexion.php'; ?>
<?php 

	$connexion = $pdoCV->query("SELECT * FROM experiences WHERE utilisateur_id = 1 ");
	$experiences = $connexion->fetchAll();
	for ($i=0; $i < count($experiences); $i++) { 
		$experiences[$i]['table'] = 'experiences';
		$experiences[$i]['date'] = $experiences[$i]['dates_e'];
	}
	// print_r($experiences);

	$connexion = $pdoCV->query("SELECT * FROM formations WHERE utilisateur_id = ".$_SESSION['membre']['utilisateur_id']." ");
	$formations = $connexion->fetchAll();
	for ($i=0; $i < count($formations); $i++) { 
		$formations[$i]['table'] = 'formations';
		$formations[$i]['date'] = $formations[$i]['dates_f'];
	}
	$resultat = array_merge($experiences, $formations);
	
	for ($i=0; $i < count($resultat) ; $i++) { 
		$date_calcul[$i] = explode('/',$resultat[$i]['date']);
		for ($j=0; $j < count($date_calcul[$i]); $j++) { 
			$date_calcul[$i][$j] = intval($date_calcul[$i][$j]);
		}
		$resultat[$i]['position'] = $date_calcul[$i][0] + $date_calcul[$i][1]*30.41 + $date_calcul[$i][2]*365;
	}

	usort($resultat, function($a, $b) {
	    return $a['position'] - $b['position'];
	});

	// print_r($resultat);

?>
<style type="text/css">



	.contenu_exp{
		height: 45vh;
		/*background-color: rgba(192, 57, 43, 0.1);*/
		opacity: 0;
		border-radius: 10px;
		margin-bottom: 15vh; 
	}

	.barre_timeline{
		width:100%;
		height: 0px;
		border: 5px solid #2E4053;
		border-radius: 5px;

	}
	div.rond{
		position: relative;
		top: -20px;
	}
	span.rond{
		height: 40px;
		width: 40px;
		border: 5px solid #2E4053;
		border-radius: 100%;
		background-color: white;
		display: block;
		transition: 1.5s;
	}
	.rond_mobile>span.rond{
		height: 30px;
		width: 30px;
		border: 5px solid #2E4053;
		border-radius: 100%;
		background-color: white;
		display: block;
		transition: 1.5s;
	}
	span.rond:hover{
		background-color: rgb(40,40,46);
	}

	.rond_mobile{
		margin-bottom: 3%;
	}

	.titre_haut{
		position: relative;
		top: -32px;
	}

	h1{
		margin-bottom: 3vh;
	}

	.mobile_row{
		margin-bottom: 2.5vh;
	}
</style>

<div class="col-md-12 hidden-xs hidden-sm content desktop">
	<div class="row">
		<div class="col-md-12">
			<h1>Experiences et formations</h1>
		</div>
		<div class="row exp">
			<div class="col-md-offset-3 col-md-6 contenu_exp">
			</div>
		</div>
		<div class="row timeline">
			<div class="col-md-12">
				<div class="row haut_timeline">
					<?php for ($i=0; $i < 12; $i++):?>
						<?php if ($i%2 == 0): ?>
							<div class="col-md-1">
							</div>
						<?php endif ?>
						<?php if ($i%2 != 0): ?>
							<div class="tm_haut col-md-1" id="titre_<?= $i ?>">
								<div class="titre_haut"><?php if (isset($resultat[$i])): echo $resultat[$i][3]; ?><?php endif ?></div>						
							</div>
						<?php endif ?>
					<?php endfor ?>
				</div>

				<div class="row barre_timeline">
					<?php for ($i=0; $i < 12; $i++):?>
						<div class="rond col-md-1">
							<span class="rond" <?php if (isset($resultat[$i])): echo "id='".$resultat[$i]['table']."_".$resultat[$i][0]."'"; ?><?php endif ?> ></span>
						</div>
					<?php endfor ?>
				</div>
					
				<div class="row bas_timeline">
					<?php for ($i=0; $i < 12; $i++):?>
						<?php if ($i%2 == 0): ?>
							<div class="titre tm_bas col-md-1" id="titre_<?= $i?>">
								<div class="titre_bas"><?php if (isset($resultat[$i])): echo $resultat[$i][3]; ?><?php endif ?></div>
							</div>
						<?php endif ?>
						<?php if ($i%2 != 0): ?>
							<div class="col-md-1">
								<div></div>
							</div>
						<?php endif ?>
					<?php endfor ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xs-12 col-sm-12 hidden-md hidden-lg content mobile">
	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<h1>Experiences et formations</h1>
		</div>
	</div>
	<?php foreach ($resultat as $result): ?>
		<div class="row mobile_row">
			<div class="col-sm-1 col-xs-1 rond_mobile">
				<span class="rond"></span>
			</div>
			<div class="col-sm-11 col-xs-11">
				<p><?= $result[1] ?> / <?= $result['date'] ?> </p>
				<br>
				<p><?= $result[4] ?></p>
			</div>
		</div>
	<?php endforeach ?>
</div>