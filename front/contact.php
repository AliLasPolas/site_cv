<?php require_once'../admin/include/connexion.php'; ?>
<?php 

	$connexion = $pdoCV->query("SELECT * FROM competences WHERE utilisateur_id = 1 ");
	$competences = $connexion->fetchAll();
?>

<div class="col-md-12 content">
	<div class="row">
		<div class="col-md-12">
			<h1>Contact</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
			
			<form>			
				<div class="form-group">
					<label for="sujet">Sujet (obligatoire)</label>
					<input required type="text" class="form-control sujet_contact" id="sujet" aria-describedby="sujet" placeholder="Sujet du message">
					<small id="text_help" class="form-text text-muted"></small>
				</div>
				<div class="form-group">
					<label for="pseudo">Nom (obligatoire)</label>
					<input required type="text" class="form-control pseudo_contact" id="texte" aria-describedby="email" placeholder="Nom (champ obligatoire)">
					<small id="nom_help" class="form-text text-muted">Entrez un pseudonyme si vous préférez</small>
				</div>
				<div class="form-group">
					<label for="email">Adresse email (obligatoire)</label>
					<input required type="email" class="form-control email_contact" id="email" aria-describedby="email" placeholder="Adresse mail (champ obligatoire)">
					<small id="email_help" class="form-text text-muted">Votre e-mail ne finira pas sur des listes d'agences de publicités</small>
				</div>
				<div class="form-group">
					<label for="telephone">Numéro de téléphone</label>
					<input type="text" class="form-control telephone_contact" id="telephone" aria-describedby="telephone" placeholder="Numéro de téléphone">
					<small id="telephone_help" class="form-text text-muted"></small>
				</div>
				<div class="form-group">
					<label for="texte">Contenu du message</label>
					<textarea required class="form-control texte_contact" id="texte" rows="3"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Envoyer</button>
			</form>
		</div>
	</div>
</div>