<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    $titre = '';
    $leftMenu = '';
    $content = 'blablabla';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="page" class="col-sm-12">
            <header class="navbar-fixed-top col-sm-12">
                <h1>
                    Site Vidéos
                    <small>
                        <?= $titre ?>
                    </small>
                </h1> 
                
            </header>
            <nav class="col-sm-3">
                <div class="containerCenter col-sm-12 containerBorder ">
                    <ul class="nav nav-pills nav-stacked col-sm-12 ">
                        <?=$leftMenu;?>
                    </ul>
                </div>
            </nav>
            <section class="col-sm-9 underNavTop">
                <div class="containerCenter col-sm-12 containerBorder " id="principal">
                    <?=$content;?>
                </div>
            </section>
        </div>           
    </body>
</html>
