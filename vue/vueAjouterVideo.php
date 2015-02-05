<?php $titre = 'Page Ajouter video'; ?>
<?php $TopContent = AfficheFormInscription(); ?>
<?php ob_start(); ?>

<form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Form Name</legend>

        <div class="form-group">
            <label class="col-md-4 control-label" for="nomVideo">Nom de la vidéo</label>  
            <div class="col-md-4">
                <input id="nomVideo" name="nomVideo" type="text" placeholder="Nom de la vidéo" class="form-control input-md">

            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-4 control-label" for="video">Choisir la vidéo</label>
            <div class="col-md-4">
                <input id="video" name="video" class="input-file" type="file">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="description">Description</label>
            <div class="col-md-4">                     
                <textarea class="form-control" id="description" name="description">Description de la vidéo</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="tags">Ajouter des tags</label>
            <div class="col-md-4">                     
                <textarea class="form-control" id="tags" name="tags">Ajouter des tags</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="upload">Uploader ou Annuler</label>
            <div class="col-md-8">
                <button id="upload" name="upload" class="btn btn-primary">Upload</button>
                <button id="annuler" name="annuler" class="btn btn-warning">Annuler</button>
            </div>
        </div>

    </fieldset>
</form>


<?php $contenu = ob_get_clean(); ?>

<?php require 'template.php'; ?>

