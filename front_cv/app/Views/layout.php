<?php 

    use Model\News\CategorieModel;
    use Model\Db\DbFactory;

 ?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Site CV Front</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="<?= $this->assetUrl('css/style.css'); ?>" rel="stylesheet" />
    <?= $this->section('css'); ?>

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
			<div class="col-xs-1">
				<p class="menu"> Menu </p>
			</div>
			<div class="col-xs-2 col-xs-offset-4">
				<p class="haut">
					Haut de page atteint
				</p>
			</div>
			<div class="col-xs-offset-4 col-xs-1 fermer hidden">
				<p>Fermer</p>
			</div>
			<div class="col-xs-offset-4 col-xs-1">
				<p class="admin"> <a href="/site_cv/admin/index_admin.php"> Admin </a></p>
			</div>
		</header>
		<main>
    	<?= $this->section('contenu'); ?>
		</main>
		<footer class="row">
			<div class="col-xs-1 scroll_down">
				<p> descendre </p>
			</div>
			<div class="col-xs-1 scroll_up">
				<p> remonter </p>
			</div>
			<div class="col-xs-2 col-xs-offset-3">
				<p class="bas">	
					Bas de page atteint
				</p>
			</div>
			<div class="col-xs-offset-3 col-xs-1">
				<p> A propos </p>
			</div>
			<div class="col-xs-1">
				<p>Heure</p>
			</div>
		</footer>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/mousewheel/3.1.13/jquery.mousewheel.js"></script>

<script type="text/javascript" src="<?= $this->assetUrl('js/defilement.js'); ?>"></script>
<script type="text/javascript" src="<?= $this->assetUrl('js/script.js'); ?>"></script>
<?= $this->section('script'); ?>
<script type="text/javascript">
	$(document).on("click", function(e){
		$.ajax({
			url: '/site_cv/front_cv/public/competences/',
			type: 'post',
		})
	});
</script>
</body>
</html>  