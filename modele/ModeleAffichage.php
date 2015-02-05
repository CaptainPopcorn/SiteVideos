<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function AfficheFormInscription(){
    $TopContent = '<form class = "form-inline col-sm-4" method = "post" action = "index.php?access=login">
                <div class = "form-group">
                    <label for = "username"> Username</label>
                    <li><input type = "text" value = "username" name = "username" class = "form-control" id = "username"></li>
                </div>
                <div class = "form-group">
                    <label for = "password"> Password</label>
                    <li><input type = "password"  name = "password" id = "password" class = "form-control"></li>
                </div>
                <div class = "form-group">
                        <input type = "submit" value = "login" name = "login" class = "btn-link">
                    </div>
                <div class = "form-group">
                        <a class = "btn-link" href = "./index.php?action=inscription"> register</a>
                    </div>
            </form>';
    
    return $TopContent;
}
