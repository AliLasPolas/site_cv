<?php require_once'include/header.php'; ?>

<?php 

$titres = $pdoCV->query("SELECT * FROM titres_cv WHERE utilisateur_id = '1' ");
$titres = $titres->fetch();

 ?>

<div class="row">
	<div class="col-md-2 ">
		<ul class="nav nav-pills nav-stacked menu_gauche">
			<li><a href="#">Compétences</a></li>
			<li><a href="#">Expériences</a></li>
			<li><a href="#">Formations</a></li>
			<li><a href="#">Inter-titres</a></li>
			<li><a href="#">Loisirs</a></li>
			<li><a href="#">Realisations</a></li>
			<li><a href="#">Titres des CVs</a></li>
			<li><a href="#">Utilisateurs</a></li>
			
		</ul>
	</div>
	<div class="col-md-10">
		<h1> <?= $titres['titre_cv'] . ' '  . $titres['accroche'] ?> </h1>
		<span class="time">
			<?php $dt = new DateTime();
			echo $dt->format('d-m-Y H:i:s');?>
		</span>

	</div>
</div>
<?php require_once'include/footer.php'; ?>