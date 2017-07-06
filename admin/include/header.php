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
	<header>Administration Site CV - <?php 

	$noms = $pdoCV->query("SELECT * FROM utilisateurs WHERE id_utilisateur = '1' ");
	$noms = $noms->fetch();
	echo $noms['prenom'] . ' ' . $noms['nom'];



	 ?></header>
	<div class="container">
		<div class="row">
			<div class="col-md-2 ">
				<ul class="nav nav-pills nav-stacked menu_gauche">
					<li><a href="competences.php">Compétences</a></li>
					<li><a href="experiences.php">Expériences</a></li>
					<li><a href="formations">Formations</a></li>
					<li><a href="intertitres.php">Inter-titres</a></li>
					<li><a href="loisirs.php">Loisirs</a></li>
					<li><a href="realisations.php">Realisations</a></li>
					<li><a href="titres.php">Titres des CVs</a></li>
					<li><a href="utilisateurs.php">Utilisateurs</a></li>
					
				</ul>
			</div>
