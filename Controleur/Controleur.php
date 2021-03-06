<?php

require_once './modele/ModeleDB.php';
require_once './modele/ModeleUtilisateurs.php';
require_once './modele/ModeleVideos.php';

// Affiche la liste de tous les billets du blog
function accueil() {
    $videos = getVideos();
    //var_dump_pre($videos);
    require './vue/vueAccueil.php';
}

// Affiche les détails sur un billet
function video($idVideo) {
    $video = getVideo($idVideo);
    //$commentaires = getCommentaires($idVideo);
    //$commentaires = getCommentaires($idVideo);
    require './vue/vueVideo.php';
}

// Affiche une erreur
function erreur($msgErreur) {
    require './vue/vueErreur.php';
}

// Appelle la vue inscription
function inscription() {

    require './vue/vueInscription.php';
}

function Affiche_AjouterVideo() {
    if (isset($_SESSION['iduser'])) {
        require './vue/vueAjouterVideo.php';
    } else {
        erreur('Vous n\'êtes pas connecté');
    }
}

function inscrit() {
    $resultat = Inscrire();
    if ($resultat == 1) {
        $_SESSION['erreur'] = 'saisiePseudoEmail';
        require './vue/vueInscription.php';
    } else if ($resultat == 2) {
        $_SESSION['erreur'] = 'existeDeja';
        require './vue/vueInscription.php';
    } else {
        require './vue/vueAccueil.php';
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

function upload() {
    if (isset($_SESSION['iduser'])) {
        if (isset($_POST['upload'])) {
            $NomVideo = $_POST['nomVideo'];
            $Description = $_POST['description'];
            $Tags = $_POST['Tags'];
            $video = $_FILES['video'];
            $urlVideo = UploadFichier($video, 'video'); // Upload video
            
            $miniature = $_FILES['miniature'];
            $urlMiniature = UploadFichier($miniature, 'miniature'); // upload miniature video
            
            $LastInsertId = UploadInfoVideo($NomVideo, $urlVideo, $urlMiniature, $Description, $_SESSION['iduser']);
            
            UploadTagsVideo($LastInsertId, $Tags);
        }else {
            require './vue/vueAccueil.php';
        }
    }else {
        erreur('Vous n\'êtes pas connecté');
    }
    require './vue/vueAjouterVideo.php';
}

function deconnexion() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); //Creer une session
    }
    session_destroy(); //Detruit la session
    session_start();
    require './vue/vueAccueil.php';
}

?>