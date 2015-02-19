<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function AfficheFormInscription() {
    if (!isset($_SESSION["pseudo"])) { //&& !(empty($_SESSION["pseudo"])))
        $TopContent = '<form class = "form-inline col-sm-4" method = "post" action = "index.php?action=login">
                <div class = "form-group">
                    <label for = "username"> Username</label>
                    <li><input type = "text" value ="" name = "username" class = "form-control" id = "username" placeholder="Username"></li>
                </div>
                <div class = "form-group">
                    <label for = "password"> Password</label>
                    <li><input type = "password"  name = "password" id = "password" class = "form-control" placeholder="Password"></li>
                </div>
                <div class = "form-group">
                        <input type = "submit" value = "login" name = "login" class = "btn-link">
                    </div>
                <div class = "form-group">
                        <a class = "btn-link" href = "./index.php?action=inscription"> register</a>
                    </div>
            </form>';
    } else {
        /*$TopContent = '<div class="form-inline col-sm-4">'
                . '<h3>Bienvenu <a class="btn-link" href"#">'.$_SESSION['pseudo'].'</a></h3> '
                . '<small><a class="btn-link" href="./index.php?action=deconnexion"> Deconnect</a></small></div>';*/
        $TopContent = '<h3> Bienvenu <a class="btn-link" href"#">'.$_SESSION['pseudo'].'</a> - '
                . '<small><a class="btn-link" href="./index.php?action=deconnexion"> Deconnect</a></small> </h3> ';
    }
    
    return $TopContent;
}
?>