<?php require_once'../admin/include/connexion.php'; ?>
<?php 

	$connexion = $pdoCV->query("SELECT * FROM titres_cv t, utilisateurs u WHERE t.utilisateur_id = u.utilisateur_id AND t.utilisateur_id = 1 ");
	$index = $connexion->fetch();
	// var_dump($index);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title><?= $index['titre_cv']?></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets_front/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
	<style type="text/css">
	</style>
</head>
<body>

<div class="contenant">
 	<ul class="nav">
 		<li class="fermer">
 			<p>Fermer</p>
 		</li>
		<li class="nav-item" id="competences">
			1 - Compétences
		</li>
		<li class="nav-item" id="experiences">
			2 - Formations / Expériences
		</li>
		<li class="nav-item" id="realisations">
			3 - Réalisations
		</li>
		<li class="nav-item" id="contact">
			4 - Contact
		</li>
	</ul>

	<div class="container-fluid contenu">
		<header class="row">
			<div class="col-xs-2 col-md-1">
				<p class="menu"> Menu </p>
			</div>
			<div class="col-xs-4 col-xs-offset-2 col-md-2 col-md-offset-4">
				<p class="haut">
					Haut de page atteint
				</p>
			</div>
			<div class="col-xs-offset-2 col-xs-2 col-md-1 col-md-offset-4 fermer hidden">
				<p>Fermer</p>
			</div>
			<div class="col-xs-offset-2 col-xs-2 col-md-1 col-md-offset-4">
				<p class="admin"> <a href="/site_cv/admin/index_admin.php"> Admin </a></p>
			</div>
		</header>
		<main class="row">
			<div class="col-md-offset-3 col-md-6 col-xs-12 col-sm-12 accueil content">
				<h1> <?= $index['prenom']?> <?= $index['nom']?> </h1>
				<h2><?= $index['titre_cv']?></h2>
				<h3><?= $index['accroche']?></h3>
				<h4>Scroll bas pour continuer</h4>
			</div>
		</main>
		<footer class="row">
			<div class="col-xs-3 col-md-1 scroll_down">
				<p> descendre </p>
			</div>
			<div class="col-xs-3 col-md-1 scroll_up">
				<p> remonter </p>
			</div>
			<div class="col-xs-2 col-md-2 col-md-offset-3 col-xs-offset-0">
				<p class="bas">	
					Bas de page atteint
				</p>
			</div>
			<div class="col-xs-offset-1 col-xs-2 col-md-1 col-md-offset-3">
				<p> A propos </p>
			</div>
			<div class="hidden-xs col-md-1 col-sm-1">
				<p>Heure</p>
			</div>
		</footer>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/mousewheel/3.1.13/jquery.mousewheel.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" integrity="sha256-0rguYS0qgS6L4qVzANq4kjxPLtvnp5nn2nB5G1lWRv4=" crossorigin="anonymous"></script>

<script type="text/javascript" src="assets_front/js/defilement.js"></script>
<script type="text/javascript" src="assets_front/js/script.js"></script>
</body>
</html>