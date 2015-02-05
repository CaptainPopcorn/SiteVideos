<?php

require_once('./Controleur/Controleur.php');

try {
    if (isset($_GET['action'])) {

        // Check action -> afficher une video
        if ($_GET['action'] == 'video') {
            // Check l'id dans l'url
            if (isset($_GET['id'])) {
                video($_GET['id']);
            } else {
                throw new Exception("Cette video n'existe pas.");
            }
        }
        
        // Check action  -> afficher la page d'inscription
        if ($_GET['action'] == 'inscription') {
            
        }
        
        // Check action  -> afficher affiche la page d'ajout de video
        if ($_GET['action'] == 'uploader') {
            
        }
        
        // Check action  -> deconnecte l'utilisateur
        if ($_GET['action'] == 'deconnexion') {
            
        }
        
    } else {
        accueil();  // action par défaut
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}
?>