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

/**
 * Permet de créer un Select (formulaire) a� partir d'un tableau associatif
 * @param type $name nom du select
 * @param type $liste tableau associatif
 * @param type $courant 
 * @param type $multiselect autorise le multi-select 
 * @return string
 */
function Select($name, $liste, $courant , $multiselect) {
    //CREATE A SELECT WITH OPTIONS
    
    if ($multiselect){
        $text = '<select id="' . $name . '" name="' . $name . '[]" multiple class="form-control" required="">';
    }else {
        $text = '<select id="' . $name . '" name="' . $name . '" class="form-control" required="">';
    }
    

    foreach ($liste as $option => $val)
        if ($option == $courant)
            $text .= '<option value="' . $option . '" selected=\"selected\">' . $val . '</option>';
        else
            $text .= '<option value="' . $option . '">' . $val . '</option>';
    $text .= '</select>';
    return $text;
}

function var_dump_pre($var) {
    echo '<pre>';
    echo var_dump($var);
    echo '</pre>';
}
