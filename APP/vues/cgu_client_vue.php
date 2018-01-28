<!DOCTYPE html>
<html>
<head>

    <meta charset=UTF-8>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/ton_style_de_base.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>
</head>
<body>
<?php include("header.php");?>

<div id="section">
    <div class="TEXTE">
        <?php
        while($donnees = $reponse->fetch()) {
            echo $donnees['Contenu'];
            echo '<br><br>Dernière modification le ', $donnees['Date_de_derniere_modification'];
        }
        ?>
    </div>

</div>


<?php
include("footer.php");
?>

</body>
</html>
