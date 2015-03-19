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
        $nbVideo++;
        $leftMenu .= '<div class="video" >'
                . '<h4><a href="./index.php?action=video&id=' . $video['idVideo'] . '">' . $video['nomVideo'] . '</a></h4>'
                . '<div class="video_section">'
                . '<img src="' . $video['urlMiniature'] . '" alt="vidéo numéro : ' . $nbVideo . '" height="100" width="100">'
                . '<p>note : '
                . '<div class="starRating">'
                . '<div class="starRating">'
                .'    <div>
                      <div>
                        <div>
                          <div>
                            <input id="rating1" type="radio" name="rating" value="1">
                            <label for="rating1"><span>1</span></label>
                          </div>
                          <input id="rating2" type="radio" name="rating" value="2">
                          <label for="rating2"><span>2</span></label>
                        </div>
                        <input id="rating3" type="radio" name="rating" value="3">
                        <label for="rating3"><span>3</span></label>
                      </div>
                      <input id="rating4" type="radio" name="rating" value="4">
                      <label for="rating4"><span>4</span></label>
                    </div>
                    <input id="rating5" type="radio" name="rating" value="5">
                    <label for="rating5"><span>5</span></label>
                  </div>
                  </div>' 
                . $video['avg_note'] . '</p>'
                . '</div>'
                . '<div class="video_section video_section_right">'
                . '<p>' . 'Description :' . '</p>'
                . '<p>' . $video['Description'] . '</p>'
                . '</div>'
                . '</div>';
    }
    return $leftMenu;
}

?>