<?php

require_once('./modele/ModeleDB.php');
require_once('./modele/ModeleVideos.php');

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
    $Pseudo = trim($Pseudo, " \t\n\r\0\x0B");
    $email = trim($email, " \t\n\r\0\x0B");
    //Test si les infos d'inscriptions correspondent déja à des infos d'un utilisateur déja dans la base
    $query_user = 'SELECT nomUtilisateur, email FROM t_utilisateurs '
            . 'WHERE nomUtilisateur = :nomUser OR email = :email';

    $statement_user = $pdo->prepare($query_user);
    $statement_user->execute(array("nomUser" => $Pseudo,
        "email" => $email));
    $statement_user = $statement_user->fetchAll();

    //Check si la variable est vide -> pas de redondance d'infos entre utilisateurs
    if (empty($statement_user)) {
        try {
            $query = 'INSERT INTO t_utilisateurs (nomUtilisateur, motDePasse, email)
                    VALUES(:nomUtilisateur,:motDePasse,:email)';
            $st = $pdo->prepare($query);
            $st->execute(array(
                'nomUtilisateur' => $Pseudo,
                'motDePasse' => $mdp,
                'email' => $email));
        } catch (Exception $e) {
            erreur($e->getMessage());
        }
    }
}

function Inscrire() {
    if (isset($_REQUEST['submit'])) {
        if ((!empty($_REQUEST['username'])) && (!empty($_REQUEST['email'])) && (!empty($_REQUEST['mdp']))) {
            Inscription_Site($_REQUEST['username'], md5($_REQUEST['mdp']), $_REQUEST['email']);
        }
    }
}
