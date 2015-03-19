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
                    <li><input type = "text" value ="" name = "username" class = "form-control" id = "username" placeholder="Username" required=""></li>
                </div>
                <div class = "form-group">
                    <label for = "password"> Password</label>
                    <li><input type = "password"  name = "password" id = "password" class = "form-control" placeholder="Password" required=""></li>
                </div>
                <div class = "form-group">
                        <input type = "submit" value = "login" name = "login" class = "btn-link">
                    </div>
                <div class = "form-group">
                        <a class = "btn-link" href = "./index.php?action=inscription"> register</a>
                    </div>
            </form>';
    } else {
        $TopContent = '<h3> Bienvenu <a class="btn-link" href"#">' . $_SESSION['pseudo'] . '</a> - '
                . '<small><a class="btn-link" href="./index.php?action=deconnexion"> Deconnect</a> - '
                . '<a href="./index.php?action=uploader">Upload</a> </small> </h3>';
    }
    return $TopContent;
}

function AfficheTopVideos($nbVideos) {
    $videos = GetTopVideos($nbVideos);
    $leftMenu = '<div class="titreVideo" >'
            . '<h2>Top Vidéos</h2>'
            . '</div>';
    $nbVideo = 0;
    foreach ($videos as $video) {
        $avg_note = GetAVGNoteFromVideo($video['idVideo']);
        if (!empty($avg_note)){
          $avg_note = round($avg_note * 2);
        } else {
            $avg_note = false;
        }
        $nbVideo++;
        $leftMenu .= '<div class="video" >'
                . '<h4><a href="./index.php?action=video&id=' . $video['idVideo'] . '">' . $video['nomVideo'] . '</a></h4>'
                . '<div class="video_section">'
                . '<img src="' . $video['urlMiniature'] . '" alt="vidéo numéro : ' . $nbVideo . '" height="100" width="100">'
                . '</div>'
                . '<div class="video_section video_section_right">'
                . '<p>' . 'Description :' . '</p>'
                . '<p>' . $video['Description'] . '</p>'
                . '</div>'
                . '<div class="video_stars">'
                . '<p>note : '.$video['avg_note']
                . '</p>'
                . '</div>'
                . '</div>';
    }
    return $leftMenu;
}

?>

<!--<input id="rating1" type="radio" name="rating" value="1">
<label for="rating1"><span>1</span></label>-->