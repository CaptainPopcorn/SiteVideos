<?php 
    $titre = 'Page Inscription';
    $TopContent = AfficheFormInscription();
    $leftMenu = '';
 ?>

<?php ob_start(); ?>

<div class="form">
    <div class="form-section ">
                <h2 class="h2"> Inscription </h2>
                <form class="form-horizontal" action="index.php?action=inscrit" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="pseudo"> Pseudo</label>                                 
                          <input type="text" value="" name="username" class="form-control" id="username" placeholder="Pseudo">
                      </div>
                    <div class="form-group">
                          <label for="email"> email </label>
                          <input type="text" value="" name="email" id="ArtistName" class="form-control" placeholder="email">
                      </div>
                      <div class="form-group">
                          <label for="mdp"> mdp</label>
                          <input type="password" name="mdp" id="mdp" class="form-control" placeholder="Mot de passe">
                      </div>
                      <div class="form-group">
                          <label for="mdp_confirm"> confirmation mdp</label>
                          <input type="password"  name="mdp_confirm" id="mdp_confirm" class="form-control" placeholder="Confirmer le mot de passe">
                      </div>

                      <div class="form-group">
                          <input type="submit" name="cancel"  class="btn-default" value="cancel">
                          <input type="submit" name="submit" class="btn-default" value="register">
                      </div>
                 </form>
               </div>
    </div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'template.php'; ?>

