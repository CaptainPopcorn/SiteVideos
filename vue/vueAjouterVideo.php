<?php $titre = 'Ajouter une video'; ?>
<?php $TopContent = AfficheFormInscription(); ?>
<?php ob_start(); ?>

<div class="form">
    <div class="form-section ">
        <form class="form-horizontal" action="index.php?action=upload" method="post" enctype="multipart/form-data">
            <h2 class="h2"> Ajouter une video </h2>
            <div class="form-group">
                <label for="nomVideo">Nom de la vidéo</label>  
                <input id="nomVideo" name="nomVideo" type="text" placeholder="Nom de la vidéo" class="form-control input-md" required="">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Description de la vidéo" required=""></textarea>
            </div>

            <div class="form-group">
                <label for="tags">Ajouter des tags</label>
                <textarea class="form-control" id="tags" name="tags" placeholder="Ajouter des tags" required=""></textarea>
            </div>

            <div class="form-group">
                <input id="video" name="video" class="input-file" type="file" accept="video/*" required="">
            </div>

            <div class="form-group">
                <button id="upload" name="upload" class="btn btn-success">Upload</button>
                <button id="annuler" name="annuler" class="btn btn-warning">Annuler</button>
            </div>
        </form>
    </div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'template.php'; ?>

