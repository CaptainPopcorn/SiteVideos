<?php

require('./ModeleDB.php');
require('./ModeleVideos.php');

function Connexion_Site($Pseudo, $mdp) {
    $pdo = ConnexionBD();
}
/**
 * Fonction d'inscription
 * Vérifie si le pseudo et/ou le mail de l'utilisateur s'inscrivant existe deja dans la base
 * Cré l'utilisateur dans la base si pas de redondance
 * @param type $Pseudo
 * @param type $mdp
 * @param type $email
 */
function Inscription_Site($Pseudo, $mdp, $email) {
    $pdo = ConnexionBD();
    
    //filtre
    $Pseudo = trim($Pseudo, " ");
    $email = trim($email, " ");
    

    //Test si les infos d'inscriptions correspondent déja à des infos d'un utilisateur déja dans la base
    $query_user = 'SELECT nomUtilisateur, email FROM t_utilisateurs '
            . 'WHERE nomUtilisateur = :nomUser OR email = :email';

    $statement_user = $pdo->prepare($query_user);
    $statement_user->execute(array("nomUser" => $Pseudo,
        "email" => $email));
    $statement_user = $statement_user->fetchAll();
    var_dump_pre($statement_user);

    //Check si la variable est vide -> pas de redondance d'infos entre utilisateurs
    if (empty($statement_user)) {
        try {
            $query = 'INSERT INTO t_utilisateurs (nomUtilisateur, motDePasse, email)'
                    . 'VALUES (:nomUser, :mdp, :email)';
            $statement = $pdo->prepare($query_user);
            $statement->execute(array("nomUser" => $Pseudo,
                "email" => $email));
            $statement = $statement->fetchAll();
            
        } catch (Exception $e) {
            erreur($e->getMessage());
        }
    }
}

function var_dump_pre($var) {
    echo '<pre>';
    echo var_dump($var);
    echo '</pre>';
}
