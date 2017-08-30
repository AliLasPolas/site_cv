<?php require_once'../../admin/include/connexion.php'; ?>
<?php 

	$connexion = $pdoCV->query("SELECT * FROM competences WHERE utilisateur_id = 1 ");
	$competences = $connexion->fetchAll();
?>
<style type="text/css">

	.desktop{
		height: 70%;
	}

	.mobile{
		height: 100%;
		margin-top: 2%;
	}

	.barre-prog-vertical {
	  width: 20px;
	  height: 60vh;
	  display: flex;
	  align-items: flex-end;
	  margin-right: 20px;
	  float: left;
	}	
	.barre-prog-horizontal {
	  width: 100%;
	  height: 20px;
	  display: flex;
	  align-items: flex-end;
	  margin-top: 5px;
	  /*float: left;*/
	}

	.barre-prog-vertical .barre-prog {
	  width: 100%;
	  height: 0;
	  -webkit-transition: width 6s ease;
	  -o-transition: width 6s ease;
	  transition: width 6s ease;
	  position: relative;
	  background-color: #5F6A6A;
	}

	.barre-prog-horizontal .barre-prog {
	  height: 100%;
	  width: 30%;
	  -webkit-transition: width 6s ease;
	  -o-transition: width 6s ease;
	  transition: width 6s ease;
	  position: relative;
	  background-color: #5F6A6A;

	}

	.competence{
		padding-left: 2%; 
	}
	h1{
		margin-bottom: 7%;
	}
	p{
		margin: 0;
		padding: 0;
	}

</style>
<div class="col-md-12 hidden-sm hidden-xs content desktop">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1>Compétences</h1>
		</div>
	</div>
	<div class="row competences">
		<div class="col-md-2 hidden-xs hidden-sm"></div>
			<?php foreach ($competences as $competence): ?>
					<div class="col-md-1 competence <?= $competence['competence'] ?> " >
						<div id="<?= $competence['competence'] ?>" class="progress barre-prog-vertical"">
							<div class="barre-prog" role="progressbar" aria-valuenow="<?= $competence['niveau'] ?>" aria-valuemin="0" aria-valuemax="100" style="height: <?= $competence['niveau'] ?>%;">
						      <span class="sr-only"><?= $competence['competence'] ?></span>
						    </div>
						</div>
					</div>

			<?php endforeach ?>
		</div>
	<div class="row">
		<div class="col-md-2"></div>
			<?php foreach ($competences as $competence): ?>
				<div class="col-md-1">
					<p><?= $competence['competence'] ?></p>
				</div>		
			<?php endforeach ?>
	</div>
</div>
<div class="col-md-12 hidden-md hidden-lg content mobile">
	<div class="row">
		<div class="col-sm-12 col-xs-12">
			<h1>Compétences</h1>
		</div>
	</div>
	<?php foreach ($competences as $competence): ?>
		<div class="row competence_texte">
			<div class="col-xs-2 col-sm-2">
				<p><?= $competence['competence'] ?></p>
			</div>			
		</div>
		<div class="row competence_barre">
			<div class="col-xs-12 col-sm-12">
				<div id="<?= $competence['competence'] ?>" class="progress barre-prog-horizontal"">
					<div class="barre-prog" role="progressbar" aria-valuenow="<?= $competence['niveau'] ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $competence['niveau'] ?>%;">
				      <span class="sr-only"><?= $competence['competence'] ?></span>
				    </div>
				</div>
			</div>
		</div>
	<?php endforeach ?>
</div>