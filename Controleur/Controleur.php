<?php

//require './Modele/Modele.php';

// Affiche la liste de tous les billets du blog
function accueil() {
  $videos = getVideos();
  require './Vue/vueAccueil.php';
}

// Affiche les détails sur un billet
function video($idVideo) {
  $video = getVideo($idVideo);
  $commentaires = getCommentaires($idVideo);
  require './Vue/vueVideo.php';
}

// Affiche une erreur
function erreur($msgErreur) {
  require './Vue/vueErreur.php';
}

?>