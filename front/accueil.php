<?php require_once'../admin/include/connexion.php'; ?>
<?php 

	$connexion = $pdoCV->query("SELECT * FROM titres_cv t, utilisateurs u WHERE t.utilisateur_id = u.utilisateur_id AND t.utilisateur_id = 1 ");
	$index = $connexion->fetch();
	// var_dump($index);
?>
<style type="text/css">
	
</style>

<div class="col-md-offset-3 col-md-6 col-xs-12 col-sm-12 accueil content">
	<h1> <?= $index['prenom']?> <?= $index['nom']?> </h1>
	<h2><?= $index['titre_cv']?></h2>
	<h3><?= $index['accroche']?></h3>
	<h4>Scroll bas pour continuer</h4>
</div>
