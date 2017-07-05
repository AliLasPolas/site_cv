<?php require_once'include/header.php'; ?>

<?php 

$titres = $pdoCV->query("SELECT * FROM titres_cv WHERE utilisateur_id = '1' ");
$titres = $titres->fetch();

 ?>
	<div class="col-md-10">
		<h1> <?= $titres['titre_cv'] . ' '  . $titres['accroche'] ?> </h1>

	</div>
<?php require_once'include/footer.php'; ?>