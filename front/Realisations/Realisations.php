<?php require_once'../../admin/include/connexion.php'; ?>
<?php 

	$connexion = $pdoCV->query("SELECT * FROM realisations WHERE utilisateur_id = 1 ");
	$realisations = $connexion->fetchAll();
?>

<style>
	.content{
		text-align: center;
	}
	figure{
		display: table;
		margin-right: auto;
		margin-left: auto;
		width: 100%;

	}
	img{
		width: 100%;
	}
	figcaption{
		overflow: hidden;
		text-align: center;
		font-size: 1.2em;
		line-height: 1.6em;
		font-weight: 400;
		color: #fff;
		background-color: rgba(0,0,0, 0.8);
		position: relative;
		top: -1.59em;
		z-index: 3;
	}
	b{
		font-size: 19px;
	}
</style>

<div class="col-xs-12 col-sm-offset-1 col-sm-10 content">
	<div class="row">
		<div class="col-md-12 col-xs-12">	
			<h1>Réalisations</h1>
		</div>
	</div>
	<?php for( $i = 0; $i < 4; $i++) : ?>
			<?php if ($i == 0): ?>
				<?php echo '<div class="row">' ?>
			<?php endif ?>
			<?php if ($i == 2): ?>
				<?php echo '<div class="row hidden-xs">' ?>
			<?php endif ?>

			<?php if (isset($realisations[$i]) && $i < 4): ?>
				
			<div class="col-md-1 hidden-xs"></div>
			<div class="col-md-5 col-xs-12">
				<figure>
					<a target='blank' href="<?= $realisations[$i]['lien_r'] ?>">
						<img src="img/<?= $realisations[$i]['image_r'] ?>" alt='<?= $realisations[$i]['sous_titre_r'] ?>'>
					</a>
					<figcaption> <?= $realisations[$i]['titre_r'] ?> </figcaption>
				</figure>
			</div>
			<?php endif ?>
			<?php if ($i == 1 ): ?>
				<?php echo '</div>' ?>
			<?php endif ?>
	<?php endfor ?>
</div>
