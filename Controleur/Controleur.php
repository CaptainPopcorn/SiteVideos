<?php

require './modele/Modele.php';

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

?>