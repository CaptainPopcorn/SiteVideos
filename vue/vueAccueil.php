<?php $titre = 'Page Accueil'; ?>

<?php
$content = Null;
var_dump_pre($videos);

for ($i = 0; $i < sizeof($videos); $i++) {
     $content ='<h1>'.$videos[$i]['nomVideo'].'</h1>';
}
?>

<?php require 'template.php'; ?>