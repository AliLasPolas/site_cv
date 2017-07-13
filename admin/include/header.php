<?php require 'include/connexion.php'; ?>

<!DOCTYPE html lang="fr">
<html>
<head>
	<meta charset="utf-8">
	<title>Testas Conexionas</title>
	<link href="https://fonts.googleapis.com/css?family=Zilla+Slab" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/site_cv/admin/asset/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/site_cv/admin/asset/css/style.css">

</head>
<body>
	<header><a href="/site_cv/admin/index_admin.php">Administration Site CV - <?php 
	if (loggedIn() ) {

		$noms = $pdoCV->query("SELECT * FROM utilisateurs WHERE utilisateur_id = '".$_SESSION['membre']['utilisateur_id']."' ");
		$noms = $noms->fetch();
		echo $noms['prenom'] . ' ' . $noms['nom'];
	}



	 ?></a>
	 </header>


	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm">
				<ul class="nav nav-pills nav-stacked menu_gauche">
					<li><a href="/site_cv/admin/index_admin.php">Index</a></li>
					<li><a href="/site_cv/admin/competences.php">Compétences</a></li>
					<li><a href="/site_cv/admin/experiences.php">Expériences</a></li>
					<li><a href="/site_cv/admin/formations.php">Formations</a></li>
					<li><a href="/site_cv/admin/intertitres.php">Inter-titres</a></li>
					<li><a href="/site_cv/admin/loisirs.php">Loisirs</a></li>
					<li><a href="/site_cv/admin/realisations.php">Realisations</a></li>
					<li><a href="/site_cv/admin/titres.php">Titres des CVs</a></li>
					<?php if ( admin() ): ?>
					<li><a href="/site_cv/admin/utilisateurs.php">Utilisateurs</a></li>
					<?php endif ?>
					<li>	 <?php 
						 if (loggedIn() == true ) {
						 	echo '<a href="?action=deconnexion" id="deconnexion">Déconnexion</a>';
						 }
						 else{
						 	echo '<a id="bouton_connexion" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Connexion</a>
							<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
									<form method="post" action="" id="form_connexion">
										<fieldset class="form-group">
											<label for="pseudo">Pseudonyme</label>
											<input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Entrez vos identifiants">
										</fieldset>
										<fieldset class="form-group">
											<label for="mdp">Mot de passe</label>
											<input type="password" class="form-control" name="mdp" id="mdp" placeholder="A l\'abri des regards">
										</fieldset>
										<fieldset class="form-group">
											<input type="submit" class="form-control" name="connexion" id="connexion"">
										</fieldset>
									</form>  
					  		    </div>
							  </div>
							</div>';
						 }
						 ?>
					</li>

					
				</ul>
			</div>

			<div class="col-md-10">

			<?php 
				if ($_POST) {
					if ($_POST['connexion']) {
						// var_dump($_POST);
						$login = $pdoCV->query("SELECT * FROM utilisateurs WHERE pseudo = '".addslashes($_POST['pseudo'])."' ");
						if ( $login->rowCount() > 0) {
						 	$login = $login->fetch();
						 	if ($login['mdp'] == addslashes($_POST['mdp'])) {
						 		foreach ($login as $indice => $element) {
						 			if ($indice != 'mdp' || $indice != 5) {
						 				$_SESSION['membre'][$indice] = $element;
						 			}
						 		}
								header("location:/site_cv/admin/index_admin.php");
						 	}
						 	else{
						 		echo '<div class="alert alert-danger"> Erreur de mot de passse. </div>';
						 	}
						}
						else{
							echo '<div class="alert alert-danger"> Erreur de mot de passse. </div>';
						}
					}
				}
				if ($_GET) {
					if ($_GET['action'] == 'deconnexion') {
							session_destroy();
							header("location:/site_cv/admin/index_admin.php");

					}
				}
			?>