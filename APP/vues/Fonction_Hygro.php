
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/APP/css/style.css">
    <link rel="stylesheet" href="http://localhost/APP/css/footer.css">
    <link rel="stylesheet" href="http://localhost/APP/css/header.css">
    <link rel="stylesheet" href="http://localhost/APP/css/Fonction_Hygro.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>
</head>

<?php include("header.php");?>

<div id="conteneur-body">
    <div id="conteneur-general-fonction-hygro">

        <div id="Titre_hygro"><br/> <h1>Fonctionnalité : Hygrométrie </h1></div>

        <div id="conteneur-general-alignement">

            <div id="conteneur-liste-pièces">
                <?php
                echo "<h2> Taux d'humidité par pièce :</h2>";
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
                    
                    $iddelactionneur1 = recup_ID_actionneur($bdd,$var2);


                    $donneeducapteur = recup_donnee_capteur_hygro($bdd,$var2);

                    $etat = recup_etat_capteur_hygro($bdd,$var2);

                    if ($etat ==1){

                        echo '<img src="image\button-green.png" alt="Fonctionnement" height="30px" width="30px" />';
                    }
                    else {
                        echo '<img src="image\button-red.png" alt="Dysfonctionnement" height="30px" width="30px" />';
                    }

                    ?>
                    <div id="conteneur-liste">
                        <ul id="Liste_pieces_fonction_hygro">

                            <li><?php echo $nomdelapiece. " : ". $donneeducapteur." g/m3"?></li>


                            <div id="conteneur_formulaire">
                                <label id="hygro_cible">Hygrométrie cible :</label>
                                <form id="formulaire" method="post" action=""> <!-- Recharge la page pour faire agir le SQL -->
                                     <input id="inputHygro" type="number" name="instruction_hygro">

                                    <input type="hidden" value="<?php echo $iddelactionneur1;?>" name="id_actionneur">  <!-- On va chercher les id actionneurs qu'on associe à leur piece de cette manière -->
                                    <input type="submit" value="Envoyer">
                                </form>
                            </div>

                            <br/>
                            <br/>

                        </ul>
                    </div>

                    <?php
                }



                if(isset($_POST['instruction_hygro']) && !empty($_POST['instruction_hygro'])){

                    echo 'Instruction prise en compte : '. $_POST['instruction_hygro']." g/m3" ;

                    $requete = $bdd->prepare('INSERT INTO instruction(instruction_capteur,ID_actionneur) VALUES(?,?)');


                    $requete->execute(array($_POST['instruction_hygro'],$_POST['id_actionneur']));
                };

                ?>

            </div>
            <div id="conteneur-info_générales"> <h2> Taux d'humidité moyen de la maison : </h2>
                <?php


                $ID_piece = recup_ID_piece($bdd);
                $total = 0; // initialisation de $total à 0
                $compteur = 0;

                while($donne=$ID_piece->fetch()){

                    $var2=$donne['ID_piece'];
                    $donneeducapteur = recup_donnee_capteur_hygro($bdd,$var2);
                    $total = $donneeducapteur + $total;
                    $compteur = $compteur + 1;
                }

                $moyenne = $total / $compteur ;
                $moyenne = round($moyenne,2).' g/m3';
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


<?php
include("footer.php");
?>