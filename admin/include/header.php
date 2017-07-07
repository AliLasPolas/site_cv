<?php require 'include/connexion.php'; ?>

<!DOCTYPE html lang="fr">
<html>
<head>
	<meta charset="utf-8">
	<title>Testas Conexionas</title>
	<link href="https://fonts.googleapis.com/css?family=Zilla+Slab" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/site_cv/admin/asset/css/style.css">

</head>
<body>
	<header><a href="/site_cv/admin/index_admin.php">Administration Site CV - <?php 

	$noms = $pdoCV->query("SELECT * FROM utilisateurs WHERE utilisateur_id = '1' ");
	$noms = $noms->fetch();
	echo $noms['prenom'] . ' ' . $noms['nom'];



	 ?></a>
	 <?php 
	 if (isset($_SESSION)) {
	 	echo '<a href="" id="deconnexion">Déconnexion</a>';
	 }
	 else{
	 	echo '<button id="bouton_connexion" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Connexion</button>
		<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
				<form method="post" action="profil.php" id="form_connexion">
					<fieldset class="form-group">
						<label for="pseudo">Pseudonyme</label>
						<input type="text" class="form-control" id="pseudo" placeholder="Entrez vos identifiants">
					</fieldset>
					<fieldset class="form-group">
						<label for="mdp">Mot de passe</label>
						<input type="password" class="form-control" id="mdp" placeholder="A l\'abri des regards">
					</fieldset>
					<fieldset class="form-group">
						<input type="submit" class="form-control" id="connexion"">
					</fieldset>
				</form>  
  		    </div>
		  </div>
		</div>';
	 }
	  ?>
	 </header>

	<div class="container">
		<div class="row">
			<div class="col-xs-2 ">
				<ul class="nav nav-pills nav-stacked menu_gauche">
					<li><a href="/site_cv/admin/index_admin.php.php">Index</a></li>
					<li><a href="/site_cv/admin/competences.php">Compétences</a></li>
					<li><a href="/site_cv/admin/experiences.php">Expériences</a></li>
					<li><a href="/site_cv/admin/formations.php">Formations</a></li>
					<li><a href="/site_cv/admin/intertitres.php">Inter-titres</a></li>
					<li><a href="/site_cv/admin/loisirs.php">Loisirs</a></li>
					<li><a href="/site_cv/admin/realisations.php">Realisations</a></li>
					<li><a href="/site_cv/admin/titres.php">Titres des CVs</a></li>
					<li><a href="/site_cv/admin/utilisateurs.php">Utilisateurs</a></li>
					
				</ul>
			</div>
