<?php
require_once('./modele/ModeleDB.php');
require_once('./modele/ModeleUtilisateurs.php');

/**
 * Récupéere les infos de toutes les videos présente dans la bdd
 * @return type
 */
function getVideos() {
    $pdo = ConnexionBD();


    $query = "SELECT * FROM t_videos";

    $statement = $pdo->prepare($query);
    $statement->execute();
    $statement = $statement->fetchAll();
    return $statement;
}

/**
 * Récupére les infos d'une video selon l'id en parametre
 * @param type $idVideo
 * @return type
 */
function getVideo($idVideo) {
    $pdo = ConnexionBD();

    $query = "SELECT * FROM t_videos WHERE idVideo = :id";

    $statement = $pdo->prepare($query);
    $statement->execute(array("id" => $idVideo));
    $statement = $statement->fetchAll();
    return $statement;
}

/**
 * Récupére touts les commentaire selon la video
 * @param type $idVideo
 * @return type
 */
function getCommentaire($idVideo) {
    $pdo = ConnexionBD();

    $query = "SELECT * FROM commenter WHERE idVideo = :id NATRURAL JOIN t_utilisateurs";

    $statement = $pdo->prepare($query);
    $statement->execute(array("id" => $idVideo));
    $statement = $statement->fetchAll();
    return $statement;
}

