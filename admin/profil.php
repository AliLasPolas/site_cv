<?php require_once'include/header.php'; ?>
<?php 
if (!isset($_SESSION['membre'])) {
	header('Location: index_admin.php');
}
else{
		$titres = $pdoCV->query("SELECT * FROM titres_cv WHERE utilisateur_id = '".$_SESSION['membre']['utilisateur_id']."' ");
		$titres = $titres->fetch();

		echo "<h1>Page de profil</h1>";
		echo "Connecté en tant que : " . $_SESSION['membre']['pseudo'];
}


?>

<!-- CACHÉ, A AFFICHER AVEC DU JS -->
	<form class="form-horizontal hidden" method="post">
	<fieldset>

	<!-- Form Name -->
	<legend>Modifier les informations</legend>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="nom">Nom</label>  
	  <div class="col-md-4">
	  <input id="nom" name="nom" type="text" placeholder="Nom" class="form-control input-md" required="">
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="prenom">Prenom</label>  
	  <div class="col-md-4">
	  <input id="prenom" name="prenom" type="text" placeholder="Prenom" class="form-control input-md" required="">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="email">Email</label>  
	  <div class="col-md-4">
	  <input id="email" name="email" type="email" placeholder="E-mail" class="form-control input-md" required="">
	    
	  </div>
	</div>

	<!-- Password input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="mdp">Mot de passe</label>
	  <div class="col-md-4">
	    <input id="mdp" name="mdp" type="password" placeholder="Mot de passe" class="form-control input-md" required="">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="pseudo">Pseudonyme</label>  
	  <div class="col-md-4">
	  <input id="pseudo" name="pseudo" type="text" placeholder="Pseudonyme" class="form-control input-md" required="">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="telephone">Téléphone</label>  
	  <div class="col-md-4">
	  <input id="telephone" name="telephone" type="text" placeholder="Téléphone" class="form-control input-md" required="">
	    
	  </div>
	</div>

	<!-- File Button --> 
	<div class="form-group">
	  <label class="col-md-4 control-label" for="avatar">Avatar</label>
	  <div class="col-md-4">
	    <input id="avatar" name="avatar" class="input-file" type="file" required>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="date_naissance">Date de naissance</label>  
	  <div class="col-md-4">
	  <input id="date_naissance" name="date_naissance" type="text" placeholder="Date de naisance" class="form-control input-md" required="">
	    
	  </div>
	</div>

	<!-- Select Basic -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="sexe">Sexe</label>
	  <div class="col-md-4">
	    <select id="sexe" name="sexe" class="form-control" required>
	      <option value="Homme">Homme</option>
	      <option value="Femme">Femme</option>
	      <option value="Autre">Autre/Non précisé</option>
	    </select>
	  </div>
	</div>

	<!-- Select Basic -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="etat_civil">État civil</label>
	  <div class="col-md-4">
	    <select id="etat_civil" name="etat_civil" class="form-control" required>
	      <option value="M.">M.</option>
	      <option value="Mme">Mme</option>
	      <option value="Autre">Autre</option>
	    </select>
	  </div>
	</div>


	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="adresse">Adresse</label>  
	  <div class="col-md-4">
	  <input id="adresse" name="adresse" type="text" placeholder="Adresse" class="form-control input-md" required="">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="code_postal">Code Postal</label>  
	  <div class="col-md-4">
	  <input id="code_postal" name="code_postal" type="number" placeholder="Code Postal" class="form-control input-md" required="">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="ville">Ville</label>  
	  <div class="col-md-4">
	  <input id="ville" name="ville" type="text" placeholder="Ville" class="form-control input-md" required="">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="pays">Pays</label>  
	  <div class="col-md-4">
	  <input id="pays" name="pays" type="text" placeholder="Pays" class="form-control input-md" required="">
	    
	  </div>
	</div>

	</fieldset>
	</form>

 
<?php require_once'include/footer.php'; ?>