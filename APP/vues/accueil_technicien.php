<?php
session_start();?>
    <!DOCTYPE html>
    <html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/APP/css/style.css">
    <link rel="stylesheet" href="http://localhost/APP/css/footer.css">
    <link rel="stylesheet" href="http://localhost/APP/css/header.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>
</head>

<?php include("header.php");?>
<?php require 'controleur/gestion_panne.php'; ?>

<div id="conteneur-body">
    <div id="conteneur_panne">
        <?php afficher_panne() ?>
    </div>
</div>


<?php
include("footer.php");
?>