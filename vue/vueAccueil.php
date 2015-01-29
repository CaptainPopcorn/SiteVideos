<?php $titre = 'Page Accueil'; ?>

<?php ob_start(); ?>



<?php $contenu = ob_get_clean(); ?>

<?php require 'template.php'; ?>