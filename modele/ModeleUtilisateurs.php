<?php
require('./ModeleDB.php');
require('./ModeleVideos.php');


function Connexion_Site($Pseudo, $mdp) {
    $pdo = ConnexionBD();
}

function Inscription_Site($Pseudo, $mdp, $email) {
    $pdo = ConnexionBD();
    
    
    $query = 'SELECT nomUtilisateur, email FROM t_utilisateurs '
            . 'WHERE nomUtilisateur = :nomUser OR email = :email';
    
    $statement = $pdo->prepare($query);
    $statement->execute(array("nomUser" => $Pseudo,
                            "email" => $email));
    $statement = $statement->fetchAll();
    var_dump_pre($statement);
    
}

function var_dump_pre($var) {
    echo '<pre>';
    echo var_dump($var);
    echo '</pre>';
}
