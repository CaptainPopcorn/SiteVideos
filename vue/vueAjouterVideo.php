<?php $titre = 'Page Ajouter video'; ?>
<?php $TopContent = AfficheFormInscription(); ?>
<?php ob_start(); ?>



<?php $contenu = ob_get_clean(); ?>

<?php require 'template.php'; ?>

