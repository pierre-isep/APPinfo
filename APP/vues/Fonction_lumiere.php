<!DOCTYPE html>
    <html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/Fonction_lumiere.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>
</head>

<?php include("header.php");?>

<?php
if(isset($_POST['instruction_lum']) && !empty($_POST['instruction_lum'])){

if($_POST['instruction_lum']==TRUE){

}

$requete = $bdd->prepare('UPDATE donnee SET valeur = 0 WHERE id_capteur = ?');

$requete->execute(array($_POST['id_capteur']));

};

if(isset($_POST['instruction_lum2']) && !empty($_POST['instruction_lum2'])){

    if($_POST['instruction_lum2']==TRUE){

    }

    $requete = $bdd->prepare('UPDATE donnee SET valeur = 1 WHERE id_capteur = ?');

    $requete->execute(array($_POST['id_capteur']));

};

?>

<div id="section">
<div id="conteneur-body">
    <div id="conteneur-general-fonction-temp">

        <div id="Titre_temp"><br><h1> Fonctionnalité : Gestion des lumières </h1></div>

        <div id="conteneur-general-alignement">

            <div id="conteneur-liste-pièces">
                <?php
                echo '<span id="titre_partie1">'."<h1> Nombre de lumières<br>alumées par pièce :</h1>".'</span>';
                echo '<br>';
                echo '<br>';
                while($donne=$ID_piece->fetch()){

                    $var2=$donne['ID_piece'];
                    $id_type = $bdd->prepare('SELECT * FROM piece WHERE id_piece = ?');
                    $id_type->execute(array($var2)); // nom piece récupéré
                    $id_type=$id_type->fetch();
                    $iddutypedelapiece=$id_type['id_type_piece'];
                    $numero = $id_type['numero'];

                    $nomdelapiece = $bdd->prepare('SELECT type FROM type_piece WHERE id_type_piece = ?');
                    $nomdelapiece->execute(array($iddutypedelapiece)); // nom piece récupéré
                    $nomdelapiece=$nomdelapiece->fetch();
                    $nomdelapiece=$nomdelapiece['type'];

                    $nomdelapiece = $nomdelapiece . ' '.$numero;

                    $idcapteurlumierev2 = recup_id_capteur_lumiere_V2($bdd,$var2);


                    $donneeducapteur = recup_donnee_capteur_lumiere($bdd,$var2);


                    $etat = recup_etat_capteur_lumiere($bdd,$var2);




                    if ($etat ==1){

                        echo '<img src="image\Fonctionnement.png" alt="Fonctionnement" height="30px" width="30px" />';
                    }
                    else {
                        echo '<img src="image\Dysfonctionnement.png" alt="Dysfonctionnement" height="30px" width="30px" />';
                    }

                    ?>
                    <div id="conteneur-liste">
                        <ul id="Liste_pieces_fonction_temp">

                            <li><?php echo $nomdelapiece. " : "?></li>
                        <br>
                            <?php
                            $id_utilisable = $idcapteurlumierev2;

                            ?>


                                <?php
                                    while ($boucle = $idcapteurlumierev2->fetch())
                                    {
                                        ?>
                                        <div id="lumiere_numserie">
                                            <li>Lumière de numéro de série
                                        <?php
                                            $boucle = $boucle['num_serie'];
                                            $donnee = $bdd->prepare('SELECT valeur FROM donnee WHERE id_capteur = ?');
                                            $donnee->execute(array($boucle));
                                            $donnee = $donnee->fetch();
                                            $donnee = $donnee['valeur'];
                                            echo $boucle.' ';


                                            $etatdemarche = etat_de_marche_lumiere($bdd,$boucle);


                                                ?>

                                                <div id="conteneur_formulaire"><label id="temp_cible">Eteindre</label>
                                                    <form id="formulaire" method="post" action=""> <!-- Recharge la page pour faire agir le SQL -->
                                                        <input id="inputlum" type="checkbox" name="instruction_lum">
                                                        <input type="hidden" value="<?php echo $boucle;?>" name="id_capteur">  <!-- On va chercher les id actionneurs qu'on associe à leur piece de cette manière -->
                                                        <input type="submit" value="Envoyer">
                                                    </form>
                                                    <br>
                                                    <label id="temp_cible"> Eclairer</label>
                                                    <form id="formulaire2" method="post" action=""> <!-- Recharge la page pour faire agir le SQL -->
                                                        <input id="inputlum2" type="checkbox" name="instruction_lum2">
                                                        <input type="hidden" value="<?php echo $boucle;?>" name="id_capteur">  <!-- On va chercher les id actionneurs qu'on associe à leur piece de cette manière -->
                                                        <input type="submit" value="Envoyer">
                                                    </form>
                                                </div>
<?php
                                                echo $etatdemarche;
                                                ?>

                                            </li>
                                        </div>
                                    <?php

                                    }

                                ?>


                            <?php

                            ?>




                            <br>
                            <br>

                        </ul>
                    </div>

                    <?php
                }

/* Fin de la boucle while affichant nom des pièces, la valeur et la checkbox */

                ?>

            </div>
            <div id="conteneur-info_générales"> <span id="nbretotal"><h1>Nombre total de lumières éclairées :</h1></span>
                <?php


                $ID_piece = recup_ID_piece($bdd);
                $total = 0; // initialisation de $total à 0

                while($donne=$ID_piece->fetch()){

                    $var2=$donne['ID_piece'];
                    $idcapteurlumierev2 = recup_id_capteur_lumiere_V2($bdd,$var2);
                    while ($boucle = $idcapteurlumierev2->fetch())
                    {
                                $boucle = $boucle['num_serie'];
                                $donnee = $bdd->prepare('SELECT valeur FROM donnee WHERE id_capteur = ?');
                                $donnee->execute(array($boucle));
                                $donnee = $donnee->fetch();
                                $donnee = $donnee['valeur'];

                                $total = $total + $donnee;

                    }
                }

                $moyenne = $total ;
                $moyenne = round($moyenne,2).' lumières éclairées dans votre maison';
                ?>
                <div id="ligne">
                    <div id="image_maison_div">
                        <img id="image-maison" src="image\picto_maison.png" alt="maison" height="100px" width="100px" />
                    </div>
                    <?php
                    echo  '<div id="affichage_moyenne">'. $moyenne .'</div> ';
                    ?>
                </div>


            </div>
        </div>
    </div>




</div>
</div>

<div>
    <?php
    include("footer.php");
    ?>
</div>

</html>



