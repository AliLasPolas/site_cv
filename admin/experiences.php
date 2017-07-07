<!-- Inclusion header -->
<?php require_once'include/header.php'; ?>

<!-- Requete noms et definition de la page courante -->

<?php 
$entete = "experience";
$entetes = "experiences";
$noms = $pdoCV->query("SELECT * FROM utilisateurs WHERE utilisateur_id = '1' ");
$noms = $noms->fetch();

$infos = $pdoCV->query("SELECT * FROM ".$entetes." WHERE utilisateur_id = '1' ");
$infos = $infos->fetchAll();
$nomsInfos = $pdoCV->query("DESCRIBE ".$entetes."");
$nomsInfos = $nomsInfos->fetchAll();
require_once'tableau.php';
 ?>

<!-- Inclusion footer -->
 
<?php require_once'include/footer.php'; ?>