<?php

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function ConnexionBD() {
    $bdd = new PDO('mysql:host=localhost;dbname=bdvideos;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

function getVideos() {
    $bdd = ConnexionBD();
}

function getVideo($idVideo) {
    $bdd = ConnexionBD();
}

function getCommentaire($idVideo) {
    $bdd = ConnexionBD();
}

function Connexion_Site($Pseudo, $mdp){
    $bdd = ConnexionBD();
}

function Inscription_Site($Pseudo, $mdp, $email){
    $bdd = ConnexionBD();
}