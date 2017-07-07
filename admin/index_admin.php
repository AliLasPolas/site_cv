<?php require_once'include/header.php'; ?>

<?php 

$titres = $pdoCV->query("SELECT * FROM titres_cv WHERE utilisateur_id = '1' ");
$titres = $titres->fetch();

 ?>
	<div class="col-md-10">
		<h1> <?= $titres['titre_cv'] . ' '  . $titres['accroche'] ?> </h1>

		<form>
			<fieldset class="form-group">
				<label for="pseudo">Pseudonyme</label>
				<input type="text" class="form-control" id="pseudo" placeholder="Entrez vos identifiants">
			</fieldset>
			<fieldset class="form-group">
				<label for="mdp">Mot de passe</label>
				<input type="password" class="form-control" id="mdp" placeholder="A l'abri des regards">
			</fieldset>
			<fieldset class="form-group">
				<input type="submit" class="form-control" id="connexion"">
			</fieldset>
		</form>


	</div>
<?php require_once'include/footer.php'; ?>