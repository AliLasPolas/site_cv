<?php use Model\Shortcut;
$this->layout('layout', ['title' => 'Tech News - Accueil', 'current' => 'Accueil']) ?>
 ?>

 <!-- Pour inclure du CSS -->
<?php $this->start('css') ?>
	<!-- Tout ce qui sera inclut ici, viendra se placer dans la section "css" du layout. -->
<?php $this->stop('css') ?>

<?php $this->start('contenu') ?>

<div class="col-md-offset-3 col-md-6 content">
	<h1>Ali MD Nizamuddin</h1>
	<h2>Développeur web full-stack</h2>
	<h3>Intégration et Développement web - En recherche de stage</h3>
	<h4>Scroll bas pour continuer</h4>
</div>

<?php $this->stop('contenu') ?>


<!-- Pour inclure des scripts -->
<?php $this->start('script') ?>
	<!-- Tout ce qui sera inclut ici, viendra se placer dans la section "script" du layout. -->
<?php $this->stop('script') ?>
