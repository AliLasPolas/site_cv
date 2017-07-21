<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Blackjack</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
	<style type="text/css">
		body{
			background-image: url(assets_front/img/secret.jpg);
		}
		.contenu{
			background-color: rgba(40,40,48,0.9);
			height: 100vh;
			width: 100vw;
			position: fixed;
			margin: 0;
			padding: 0;
		}

		.croupier{
			position: fixed;
			height: 35vh;
			width: 100vw;
			margin: 0;
			padding: 0;
		}

		.table{
			position: fixed;
			height: 30vh;
			width: 100vw;
			top: 35vh;
			margin: 0;
			padding: 0;
		}

		.joueur{
			margin: 0;
			padding: 0;
			position: fixed;
			height: 35vh;
			width: 100vw;
			top: 65vh;
		}
		.place{
			height: 40vh;
			/*background-color: #ddd;*/
		}

	</style>
</head>
<body>
	<div class="contenu container-fluid">
		<div class="croupier">
		  	<?php for ($i=0; $i<12; $i++): ?>
				<div class="col-md-1 place place_croupier">
					
				</div>
			<?php endfor ?>
		</div>
		<div class="table">
			<div class="col-md-1 col-md-offset-5"></div>
			<div class="col-md-1"></div>
		</div>
		<div class="joueur">
			<div class="row">
				<?php for ($i=0; $i<12; $i++): ?>
					<div class="col-md-1 place place_joueur">
						
					</div>
				<?php endfor ?>
			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" integrity="sha256-0rguYS0qgS6L4qVzANq4kjxPLtvnp5nn2nB5G1lWRv4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets_front/js/secret.js"></script>

</body>
</html>