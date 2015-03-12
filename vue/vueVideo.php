<?php $TopContent = AfficheFormInscription(); ?>
<?php $titre = 'Page video'; ?>

<?php ob_start(); ?>
<div class="Videos">
    <video width="560" height="315" controls>
        <source src="videos/1.mp4" type="video/mp4">
    </video>


    <h1> <?= $video['nomVideo'] ?></h1>
</div>

<?php $contenu = ob_get_clean(); ?>
<?php require 'template.php'; ?>


