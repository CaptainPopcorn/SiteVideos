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
    if (Inscrire()){
        require './vue/vueAccueil.php';
    }
    else{
        $_SESSION['erreur'] = 'saisiePseudoEmail';
        require './vue/vueInscription.php';
    }
}

function connexion() {
    if (isset($_POST['login'])) {
        $pseudo = $_POST['username'];
        $mdp = $_POST['password'];
        Connexion_Site($pseudo, md5($mdp));
    }
    require './vue/vueAccueil.php';
}

function deconnexion() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();//Creer une session
    }  
    session_destroy(); //Detruit la session
    session_start();
    require './vue/vueAccueil.php';
}
?>