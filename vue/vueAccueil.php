<?php $titre = 'Page Accueil'; ?>

<?php ob_start(); ?>

<?php for ($i = 0; $i < sizeof($videos); $i++) { ?>
    <h1> <?= $videos[0]['nomVideo'] ?></h1>
<?php } ?>
<?php $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>