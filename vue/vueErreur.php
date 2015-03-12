<?php $titre = 'Mon Blog'; ?>
<?php $TopContent = AfficheFormInscription(); ?>
<?php $leftMenu = AfficheTopVideos(3); ?>
<?php ob_start() ?>
<p>Une erreur est survenue : <?= $msgErreur ?></p>
<?php $contenu = ob_get_clean(); ?>

<?php require 'template.php'; ?>