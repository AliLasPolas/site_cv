<?php use Model\Shortcut;
$this->layout('layout', ['title' => 'Tech News - Accueil', 'current' => 'Accueil']) ?>
 ?>
 <!-- Pour inclure du CSS -->
<?php $this->start('css') ?>
	<!-- Tout ce qui sera inclut ici, viendra se placer dans la section "css" du layout. -->
<?php $this->stop('css') ?>


<?php $this->start('contenu') ?>
<div class="col-md-12 content">
	<div>
		Liste competences avec pourcentages (animé).
	</div>
</div>
<?php $this->stop('contenu') ?>

<!-- Pour inclure des scripts -->
<?php $this->start('script') ?>
	<!-- Tout ce qui sera inclut ici, viendra se placer dans la section "script" du layout. -->
<?php $this->stop('script') ?>
