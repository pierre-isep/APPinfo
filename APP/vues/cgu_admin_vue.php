<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/APP/css/style.css">
    <link rel="stylesheet" href="http://localhost/APP/css/footer.css">
    <link rel="stylesheet" href="http://localhost/APP/css/header.css">
    <link rel="stylesheet" href="http://localhost/APP/css/ton_style_de_base.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>
</head>
<body>
<?php include("header.php");?>

<div id="section">
    <div class="texte">
        <form class="" action="index.php?cible=cgu_admin_controleur" method="post">
            <?php
            $donnees = $reponse->fetch();?>
            <textarea name="Contenu" rows="8" cols="80"><?php echo $donnees['Contenu'] ?></textarea>
            <br>
            <input type="submit" name="" value="Valider">
        </form>
    </div>

</div>


<?php
include("footer.php");
?>

</body>
</html>
