<?php $titre = 'Page Accueil'; ?>
<?php $TopContent = AfficheFormInscription(); ?>
<?php $leftMenu = AfficheTopVideos(3); ?>
<?php ob_start(); ?>

<h1 style="text-align: center"> Liste des vidéos </h1>
<?php if (!empty($videos)) {
    for ($i = 0; $i < sizeof($videos); $i++) {
        ?>
        <div class="ListeVideos col-sm-12">
            <div class="miniature col-sm-5">
                 <a href="?action=video&id=<?= $videos[$i]['idVideo']; ?>">
                    <img height="250" src="<?= $videos[$i]['urlMiniature'] ?>">
                </a>     
            </div>
            <div class="infosVideo col-sm-7">
                 <a href="?action=video&id=<?= $videos[$i]['idVideo']; ?>">
                    <h1> <?= $videos[$i]['nomVideo'] ?></h1>
                    <p><?= $videos[$i]['Description'] ?></p>
                </a>
            </div>
        </div>

    <?php }
} ?>
<?php $contenu = ob_get_clean(); ?>
<?php require 'template.php'; ?>