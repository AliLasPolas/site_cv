<?php require_once'include/header.php'; ?>
<?php 
if (!isset($_SESSION)) {
	header('Location: index_admin.php');
}
?>

 
<?php require_once'include/footer.php'; ?>