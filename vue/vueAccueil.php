<?php $titre = 'Page Accueil'; ?>
<?php $TopContent = AfficheFormInscription(); ?>
<?php $leftMenu = AfficheTopVideos(3); ?>
<?php ob_start(); ?>

<h1 style="text-align: center"> Liste des vidéos </h1>
<?php
if (!empty($videos)) {
    forEACH ($videos as $video) {
        ?>
        <div class="ListeVideos col-sm-12">
            <div class="miniature col-sm-5">
                <a href="?action=video&id=<?= $video['idVideo']; ?>">
                    <img height="35%" width="50%" src="<?= $video['urlMiniature'] ?>">
                </a>     
            </div>
            <div class="infosVideo col-sm-7">
                <a href="?action=video&id=<?= $video['idVideo']; ?>">
                    <h1> <?= $video['nomVideo'] ?></h1>
                </a>
                <p><?= $video['Description'] ?></p>

            </div>
        </div>

    <?php }
}
?>
<?php $contenu = ob_get_clean(); ?>
<?php require 'template.php'; ?>