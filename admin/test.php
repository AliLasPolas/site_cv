<?php require '/include/connexion.php'; ?>

<!DOCTYPE html lang="fr">
<html>
<head>
	<meta charset="utf-8">
	<title>Testas Conexionas</title>
	<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/site_cv/admin/asset/css/style.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
	<?php 
		$sql = $pdoCV->query("SELECT * FROM utilisateurs WHERE id_utilisateur = '".$_SESSION['membre']['utilisateur_id']."' ");
		$ligne = $sql->fetch();
	 ?>
	<p>Muh gal ain't no hobbit <?= $ligne['prenom'] . ' ' . $ligne['nom'] ?> </p>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>