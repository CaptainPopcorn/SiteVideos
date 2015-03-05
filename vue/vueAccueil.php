<?php $titre = 'Page Accueil'; ?>
<?php $TopContent = AfficheFormInscription(); ?>
<?php ob_start(); ?>
<h1> Liste des vidéos </h1>
<?php for ($i = 0; $i < sizeof($videos); $i++) { ?>
    <h1> <?= $videos[0]['nomVideo'] ?></h1>
    <img src="<?= $videos[0]['urlVideo'] ?>">
<?php } ?>
<?php $contenu = ob_get_clean(); ?>
<?php require 'template.php'; ?>