<?php require_once'include/header.php'; ?>

<?php 

	if (loggedIn() ) {
		$titres = $pdoCV->query("SELECT * FROM titres_cv WHERE utilisateur_id = '".$_SESSION['membre']['utilisateur_id']."' ");
		$titres = $titres->fetch();


		echo "<h1> ".$titres['titre_cv']." ".$titres['accroche']." </h1>";
		echo "<h3>Bienvenue sur l'admin de site CV </h3>";

	}
	else {
		echo'
		<h1> Bienvenue sur le site cv de Ali, partie admin.  </h1>
		<form method="post" action="/site_cv/admin/index_admin.php">
			<fieldset class="form-group">
				<label for="pseudo">Pseudonyme</label>
				<input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Entrez vos identifiants">
			</fieldset>
			<fieldset class="form-group">
				<label for="mdp">Mot de passe</label>
				<input type="password" class="form-control" name="mdp" id="mdp" placeholder="A l\'abri des regards">
			</fieldset>
			<fieldset class="form-group">
				<input type="submit" class="form-control" id="connexion" name="connexion">
			</fieldset>
		</form>
		<p> Vous devez vous connecter pour accéder au contenus. Utilisez le formulaire de contact pour obtenir des identifiants. </p>';
	}
	?>
	</div>
<?php require_once'include/footer.php'; ?>