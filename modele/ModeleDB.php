<?php

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function ConnexionBD() {
    
    static $pdo = null;
    if ($pdo === null) {
        $pdo = new PDO('mysql:host=localhost;dbname=bdvideos', 'root', '');
        $pdo->exec('set character set utf8');
    }
    return $pdo;
}

function var_dump_pre($var) {
    echo '<pre>';
    echo var_dump($var);
    echo '</pre>';
}
