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
    $statement = $statement->fetch();
    return $statement;
}

/**
 * Récupére tous les commentaires selon la video
 * @param type $idVideo
 * @return type
 */
function getCommentaire($idVideo) {
    $pdo = ConnexionBD();

    $query = "SELECT * FROM commenter WHERE idVideo = :id NATRURAL JOIN t_utilisateurs";
    $statement = $pdo->prepare($query);
    $statement->execute(array("id" => $idVideo));
    $statement = $statement->fetch();
    return $statement;
}

/**
 * Récupère tous les tags de la bdd
 * @return type
 */
function getTags() {
    $pdo = ConnexionBD();

    $query = "SELECT * FROM t_tags";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $statement = $statement->fetchAll();
    return $statement;
}

/**
 * Ajoute les informations de la vidéo dans la base
 */
function UploadInfoVideo($nomVideo, $urlVideo, $urlMiniature, $Description, $idUtilisateur) {
    $pdo = ConnexionBD();

    $date = date('Y-m-d');

    $query = 'INSERT INTO t_videos (nomVideo, urlVideo, urlMiniature, Description, idUtilisateur, DateSortie) '
            . 'VALUES (:nomVideo, :urlVideo, :urlMiniature, :Description, :idUtilisateur, :DateSortie)';
    $statement = $pdo->prepare($query);
    $statement->execute(array(':nomVideo' => $nomVideo,
        ':urlVideo' => $urlVideo,
        ':urlMiniature' => $urlMiniature,
        ':Description' => $Description,
        'idUtilisateur' => $idUtilisateur,
        'DateSortie' => $date));
    $statement = $statement->fetchAll();
    return $pdo->lastinsertid();


    // $query = 'INSERT INTO t_utilisateurs (nomUtilisateur, motDePasse, email)
    //  VALUES(:nomUtilisateur,:motDePasse,:email)';
}

/**
 * Upload le fichier sur le dossier du serveur
 */
function UploadFichier($Fichier, $type) {
    if ($type == 'video') {
        $uploaddir = './videos/';
        $path_info = pathinfo($Fichier['name']);
        $extension = $path_info['extension'];
        $temp_file_name = uniqid(true) . '.' . $extension;
        $uploadfile = $uploaddir . $temp_file_name;
        move_uploaded_file($Fichier['tmp_name'], $uploadfile);
    }

    if ($type == 'miniature') {
        $uploaddir = './miniatures/';
        $path_info = pathinfo($Fichier['name']);
        $extension = $path_info['extension'];
        $temp_file_name = uniqid(true) . '.' . $extension;
        $uploadfile = $uploaddir . $temp_file_name;
        move_uploaded_file($Fichier['tmp_name'], $uploadfile);
    }
    return $uploadfile;
}

/**
 * Transforme la liste des tags en tableau associatif 
 * @return type
 */
function TagsAssociatif() {
    //TRANSFORM ARRAY IN ASSOCIATIF ARRAY FOR CLUB
    $Tableau = getTags();
    $TagsAssociatif = array();
    foreach ($Tableau as $a) {
        $TagsAssociatif[$a['idTag']] = $a['Name'];
    }
    return $TagsAssociatif;
}

function GetLastVideos($n) {
    $pdo = ConnexionBD();
    $query = 'SELECT * FROM (
    SELECT * FROM t_videos ORDER BY idUtilisateur DESC LIMIT ' . $n . '
    ) sub
    ORDER BY idUtilisateur DESC';
    $statement = $pdo->prepare($query);
    $statement->execute();
    $statement = $statement->fetchAll();
    return $statement;
}

function GetTopVideos($n) {
    $pdo = ConnexionBD();
    $query = 'SELECT *, AVG(Note) as avg_note
            FROM noter
            NATURAL JOIN t_videos
            GROUP BY nomVideo
            ORDER BY avg_note DESC LIMIT ' . $n;
    $statement = $pdo->prepare($query);
    $statement->execute();
    $statement = $statement->fetchAll();
    return $statement;
}

function GetAVGNoteFromVideo($id) {
    $pdo = ConnexionBD();
    $query = 'SELECT AVG(Note) as avg
            FROM noter
            WHERE idVideo=' . $id;
    $statement = $pdo->prepare($query);
    $statement->execute();
    $statement = $statement->fetch();
    return $statement['avg'];
}

Function UploadTagsVideo($id, $tags) {
    $pdo = ConnexionBD();

    foreach ($tags as $tag) {
        $query = 'INSERT INTO definir VALUES(:idTag, :idUtilisateur)';
        $statement = $pdo->prepare($query);
        $statement->execute(array("idTag" => $tag, 
            "idUtilisateur" => $id));
        $statement = $statement->fetch();
    }
    return;
}

?>
