
<!DOCTYPE html>
    <html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/Fonction_Temp.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>
</head>
<body>
<?php include("header.php");?>

<div id="section">

<div id="conteneur-body">
    <div id="conteneur-general-fonction-temp">

        <div id="Titre_temp"><br/> <h1>Fonctionnalité : Température</h1></div>

        <div id="conteneur-general-alignement">

            <div id="conteneur-liste-pièces">
                <?php
        echo "<h1> Température par pièce :</h1>";
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


                    $iddelactionneur1 = recup_ID_actionneur($bdd,$var2); // fonctionne bien

                    $donneeducapteur = recup_donnee_capteur_temp($bdd,$var2);


                    $etat = recup_etat_capteur_temp($bdd,$var2);

                    if ($etat ==1){

                      echo '<img src="image\button-green.png" alt="Fonctionnement" height="30px" width="30px" />';
                    }
                    else {
                        echo '<img src="image\button-red.png" alt="Dysfonctionnement" height="30px" width="30px" />';
                    }

                    ?>
                    <div id="conteneur-liste">
                        <ul id="Liste_pieces_fonction_temp">

                            <li><?php echo $nomdelapiece. " : ". $donneeducapteur." °C"?></li>
                            <div id="conteneur_formulaire"><label id="temp_cible">Température cible :</label>
                                <form id="formulaire" method="post" action=""> <!-- Recharge la page pour faire agir le SQL -->
                                    <input id="inputTemp" type="number" name="instruction_temp">

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



                if(isset($_POST['instruction_temp']) && !empty($_POST['instruction_temp'])){

                    echo 'Instruction prise en compte : '. $_POST['instruction_temp']." °C" ;

                    $requete = $bdd->prepare('INSERT INTO instruction(instruction_capteur,ID_actionneur) VALUES(?,?)');

                    $requete->execute(array($_POST['instruction_temp'],$_POST['id_actionneur']));
                };

                ?>

            </div>
            <div id="conteneur-info_générales"> <h1>Température moyenne de la maison :</h1>
             <?php


             $ID_piece = recup_ID_piece($bdd);
             $total = 0; // initialisation de $total à 0
             $compteur = 0;

                while($donne=$ID_piece->fetch()){

                    $var2=$donne['ID_piece'];
                    $donneeducapteur = recup_donnee_capteur_temp($bdd,$var2);
                    $total = $donneeducapteur + $total;
                    $compteur = $compteur + 1;
                }

                $moyenne = $total / $compteur ;
                $moyenne = round($moyenne,2).' °C';
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


<?php
include("footer.php");
?>

</body>
</html>




