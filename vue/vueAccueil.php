<?php $titre = 'Page Accueil'; ?>

<?php ob_start(); ?>
<?= var_dump_pre($videos); ?>

<?php //for ($i = 0; $i < sizeof($videos); $i++) { ?>
    <h1> <?= $videos[$i]['nomVideo'] ?></h1>
<?php// } ?>
<?php $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>