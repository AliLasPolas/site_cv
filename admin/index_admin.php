<?php require_once'include/header.php'; ?>

<?php 

	if (loggedIn() ) {
		header('location:/site_cv/admin/profil.php');

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
		<p> Vous devez vous connecter pour accéder aux contenus. Utilisez le formulaire de contact pour obtenir des identifiants. </p>';
		
	}
	?>
	</div>
<?php require_once'include/footer.php'; ?>