<?php

require_once './modele/ModeleDB.php';
require_once './modele/ModeleUtilisateurs.php';
require_once './modele/ModeleVideos.php';


// Affiche la liste de tous les billets du blog
function accueil() {
  $videos = getVideos();
  require './vue/vueAccueil.php';
}

// Affiche les détails sur un billet
function video($idVideo) {
  $video = getVideo($idVideo);
  $commentaires = getCommentaires($idVideo);
  require './vue/vueVideo.php';
}

// Affiche une erreur
function erreur($msgErreur) {
  require './vue/vueErreur.php';
}

// Appelle la vue inscription
function inscription(){
    
    require './vue/vueInscription.php';
}
function inscrit(){
    Inscrire();
    require './vue/vueAccueil.php';
}
?>