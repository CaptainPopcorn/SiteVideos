<?php $TopContent = AfficheFormInscription(); ?>
<?php $leftMenu = AfficheTopVideos(3); ?>
<?php $titre = 'Page video'; ?>

<?php ob_start(); ?>
<div class="video">
    <video width="975" height="472" controls>
        <source src="<?= $video['urlVideo'] ?>" type="video/mp4">
    </video>


    <h1> <?= $video['nomVideo'] ?></h1>
</div>

<?php $contenu = ob_get_clean(); ?>
<?php require 'template.php'; ?>


