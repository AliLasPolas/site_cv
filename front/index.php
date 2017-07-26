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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $index['titre_cv']?></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
	<link rel="stylesheet" type="text/css" href="assets_front/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
	<style type="text/css">
		.hidden_index{
			display: none;
		}
	</style>
</head>
<body>
<?php 
	if (isset($_GET['index'])) {
		echo '<div class="hidden_index">' . $_GET['index'] . '</div>';
	}
?>

<div class="contenant">
 	<ul class="nav">
 		<li class="fermer">
 			<p class="fixed_text">Fermer</p>
 		</li>
		<li class="nav-item" id="competences">1 - Compétences</li>
		<li class="nav-item" id="experiences">2 - Formations / Expériences</li>
		<li class="nav-item" id="realisations">3 - Réalisations</li>
		<li class="nav-item" id="contact">4 - Contact</li>
	</ul>

	<div class="container-fluid contenu">
		<header class="row">
			<div class="col-xs-2 col-md-1">
				<p class="menu fixed_text"> Menu </p>
			</div>
			<div class="col-xs-5 col-xs-offset-1 col-md-2 col-md-offset-4">
				<p class="haut fixed_text">
					Haut de page atteint
				</p>
			</div>
			<div class="col-xs-offset-2 col-xs-2 col-md-1 col-md-offset-4 fermer hidden">
				<p class="fixed_text">Fermer</p>
			</div>
			<div class="col-xs-offset-1 col-xs-3 col-md-1 col-md-offset-4">
				<p class="admin fixed_text"> <a href="/site_cv/admin/index_admin.php">Admin</a></p>
			</div>
		</header>
		<main class="row">
		</main>
		<footer class="row">
			<div class="hidden-xs col-xs-3 col-md-1 scroll_down">
				<p class="fixed_text"> Descendre </p>
			</div>
			<div class="hidden-xs col-xs-3 col-md-1 scroll_up">
				<p class="fixed_text"> Remonter </p>
			</div>
			<div class="col-xs-5 col-xs-offset-3 col-md-3z col-md-offset-2">
				<p class="bas fixed_text">	
					Bas de page, mais il reste un petit secret a découvrir.
				</p>
				
			</div>
			<div class="col-xs-offset-1 col-xs-2 col-md-1 col-md-offset-3">
			</div>
			<div class="hidden-xs col-md-1 col-md-offset-7 col-sm-1">
				<p class="heure fixed_text">00:00:00</p>
			</div>
		</footer>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/mousewheel/3.1.13/jquery.mousewheel.js"></script>

<script type="text/javascript" src="assets_front/js/jquery.touchSwipe.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" integrity="sha256-0rguYS0qgS6L4qVzANq4kjxPLtvnp5nn2nB5G1lWRv4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets_front/js/defilement.js"></script>
<script type="text/javascript" src="assets_front/js/script.js"></script>

<script type="text/javascript">
	/*Code Konami*/
	//Haut, haut, bas, bas, gauche, droite, gauche, droite, B, A
		var k = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65],
		n = 0;
		$(document).keydown(function (e) {
		    if (e.keyCode === k[n++]) {
		        if (n === k.length) {
		            window.location.replace("/site_cv/front/seacat_scrt.html");
		            n = 0;
		            return false;
		        }
		    }
		    else {
		        n = 0;
		    }
		});
</script>
</body>
</html>