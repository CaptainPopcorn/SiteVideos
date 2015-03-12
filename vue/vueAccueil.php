<?php $titre = 'Page Accueil'; ?>
<?php $TopContent = AfficheFormInscription(); ?>
<?php $leftMenu = AfficheTopVideos(3); ?>
<?php ob_start(); ?>

<h1> Liste des vidéos </h1>
<?php for ($i = 0; $i < sizeof($videos); $i++) { ?>
    <div class="ListeVideos">
        <a class="col-sm-5" href="?action=video&id=<?= $videos[$i]['idVideo']; ?>">
            <img class="miniature" height="250" src="<?= $videos[$i]['urlMiniature'] ?>">
        </a>     

        <a class="col-sm-7" href="?action=video&id=<?= $videos[$i]['idVideo']; ?>">
            <h1> <?= $videos[$i]['nomVideo'] ?></h1>
        </a>
    </div>

<?php } ?>
<?php $contenu = ob_get_clean(); ?>
<?php require 'template.php'; ?>