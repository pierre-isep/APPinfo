<?php
session_start();?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/APP/css/style.css">
    <link rel="stylesheet" href="http://localhost/APP/css/footer.css">
    <link rel="stylesheet" href="http://localhost/APP/css/header.css">
    <link rel="stylesheet" href="http://localhost/APP/css/Gestion_capteur_piece.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>
</head>
<body>
<?php include("header.php");?>

<div id="section">

    <?php
    $req = $bdd->prepare('SELECT nom_piece FROM piece WHERE id_piece =:id_piece ');
    $req->execute(array(
    'id_piece' => $id_piece));
    $piece = $req->fetch(); ?>
        <h1><?php echo $piece['nom_piece']?></h1>

        

        
        <?php
        
        $ID_capteur = recup_id_capteur($bdd);

        while($donne=$ID_capteur->fetch()){

            $var2='1';
            $var3=$donne['num_serie'];

            $nom_piece=recup_nom_piece($bdd,$var2);
            $unitecapteur=recup_unite_capteur($bdd,$var3);
            $donneeducapteur = recup_donee_capteur($bdd,$var3);
            $nomducapteur= recup_nom_capteur($bdd,$var3);
            $etat=recup_etat_capteur($bdd,$var3);
            $idtypeducapteur=recup_id_type_capteur($bdd,$var3);
            $iddelactionneur=recup_ID_actionneur($bdd,$var2);
            ?><div class='capteur' ><?php
            if ($etat ==1){

                echo '<div class=etat><img src="http://localhost/APP/image/button-green.png" alt="Fonctionnement" height="30px" width="30px" /></div><br/>';

            }
            if ($etat==0) {
                echo '<div class=etat><img src="htp://localhost/APP/image/button-red.png" alt="Dysfonctionnement" height="30px" width="30px" /></div><br/>';
            }

            if ($idtypeducapteur==1){
                ?>
                <div id="conteneur-liste">
                    <ul id="Liste_pieces_fonction_temp">

                        <li><?php echo '<Strong>Température</Strong>'. " : ". $donneeducapteur." ".'°C'?></li>
                        <div id="conteneur_formulaire"><label id="Valeur_cible">Valeur cible :</label>
                            <form id="formulaire" method="post" action=""> <!-- Recharge la page pour faire agir le SQL -->
                                <input id="inputCapteur" type="number" min="12" max="30" name="instruction_capt">°C

                                <input type="hidden" value="<?php echo $iddelactionneur;?>" name="id_actionneur">  <!-- On va chercher les id actionneurs qu'on associe à leur piece de cette manière -->
                                <input type="submit" value="Envoyer">
                            </form>
                        </div>

                    </ul>
                <?php echo '</div><div id=poubelle><form method=get action=http://localhost/APP/index.php?cible=Gestion_capteurs_piece&fonction=supprimer_capteur?numCapteur='.$var3.'><button id="bouton_supprimer" >
                                Supprimer <img id="picto_supprimer" src="http://localhost/APP/image/icone_poubelle.png" title="supprimer" />
                            </button>'?>
</form></div>
            </div>
           

            <?php
            }

            if ($idtypeducapteur==2){

                ?>
                <div id="conteneur-liste">
                    <ul id="Liste_pieces_fonction_temp">

                        <li><?php echo '<Strong>Luminosité</Strong>'. " : ". $donneeducapteur." ".$unitecapteur?></li>
                        <div id="conteneur_formulaire"><label id="Valeur_cible">Valeur cible :</label>
                            <form id="formulaire" method="post" action=""> <!-- Recharge la page pour faire agir le SQL -->
                                <input id="inputCapteur" type="number" min="0" name="instruction_capt"><?php echo $unitecapteur ?>

                                <input type="hidden" value="<?php echo $iddelactionneur;?>" name="id_actionneur">  <!-- On va chercher les id actionneurs qu'on associe à leur piece de cette manière -->
                                <input type="submit" value="Envoyer">
                            </form>
                        </div>
                    </ul>
                
            
               

                <?php

                if ($donneeducapteur==0){
                    echo 'Les lumières sont éteintes<br/>';
                    echo    '<form id="formulaire" method="post" action=""> <!-- Recharge la page pour faire agir le SQL -->
                                <input id="inputCapteur" type="hidden" value="1" name="instruction_capt">

                                <input type="hidden" value='.$iddelactionneur.' name="id_actionneur"> 
                                <input type="submit" value="Allumer les lumières">
                            </form>';
                    echo'</div><div id=poubelle><form method=get action=http://localhost/APP/index.php?cible=Gestion_capteurs_piece&fonction=supprimer_capteur><input type="hidden" value=' .$var3.' name="numCapteur">
                    <button id="bouton_supprimer" >
                                Supprimer <img id="picto_supprimer" src="http://localhost/APP/image/icone_poubelle.png" title="supprimer" />
                            </button> 
</form></div></div>';
                }
                else{
                    echo 'Les lumières sont allumées<br/>';
                    echo    '<form id="formulaire" method="post" action=""> <!-- Recharge la page pour faire agir le SQL -->
                                <input id="inputCapteur" type="hidden" value="1" name="instruction_capt">

                                <input type="hidden" value='.$iddelactionneur.' name="id_actionneur"> 
                                <input type="submit" value="Eteindre les lumières">
                            </form>';
                    echo '</div><div id=poubelle><form method=get action=http://localhost/APP/index.php?cible=Gestion_capteurs_piece&fonction=supprimer_capteur><input type="hidden" value=' .$var3.' name="numCapteur"><button id="bouton_supprimer" >
                                Supprimer <img id="picto_supprimer" src="http://localhost/APP/image/icone_poubelle.png" title="supprimer" />
                            </button> 
</form></div></div>';
                }

            }

            if ($idtypeducapteur==3){

                ?>
                <div id="conteneur-liste">
                    <ul id="Liste_pieces_fonction_temp">

                        <li><?php echo '<Strong>Humidité</Strong>'. " : ". $donneeducapteur." ".$unitecapteur?></li>
                        <div id="conteneur_formulaire"><label id="Valeur_cible">Valeur cible :</label>
                            <form id="formulaire" method="post" action=""> <!-- Recharge la page pour faire agir le SQL -->
                                <input id="inputCapteur" type="number" min="0" max="100" name="instruction_capt">g/m^3

                                <input type="hidden" value="<?php echo $iddelactionneur;?>" name="id_actionneur">  <!-- On va chercher les id actionneurs qu'on associe à leur piece de cette manière -->
                                <input type="submit" value="Envoyer">
                            </form>
                        </div>
                    </ul>
                <?php echo'</div><div id=poubelle><form method=get action=http://localhost/APP/index.php?cible=Gestion_capteurs_piece&fonction=supprimer_capteur><input type="hidden" value=' .$var3.' name="numCapteur"><button id="bouton_supprimer" >
                                Supprimer <img id="picto_supprimer" src="http://localhost/APP/image/icone_poubelle.png" title="supprimer" />
                            </button>'?>

</form></div>
            </div>
               

                <?php
            }

            if ($idtypeducapteur==4){
                ?>
                <div id="conteneur-liste">
                    <ul id="Liste_pieces_fonction_temp">

                        <li><?php echo '<Strong>Fenêtres</Strong>'. " : "?></li>
                    </ul>
                
        
               

                <?php
                if ($donneeducapteur==0){
                    echo $iddelactionneur."Les fenêtres sont fermées<br/>";
                    echo    '<form id="formulaire" method="post" action=""> <!-- Recharge la page pour faire agir le SQL -->
                                <input id="inputCapteur" type="hidden" value="1" name="instruction_capt">

                                <input type="hidden" value='.$iddelactionneur.' name="id_actionneur"> 
                                <input type="submit" value="Ouvrir toutes les fenêtres">
                            </form>';
                    echo '</div>
                        <div id=poubelle><form method=get action=http://localhost/APP/index.php?cible=Gestion_capteurs_piece&fonction=supprimer_capteur><input type="hidden" value=' .$var3.' name="numCapteur"><button id="bouton_supprimer" >
                                Supprimer <img id="picto_supprimer" src="http://localhost/APP/image/icone_poubelle.png" title="supprimer" />
                            </button> 
</form></div></div>';
                }
                else{
                    echo $iddelactionneur."Les fenêtres sont ouvertes<div class=Fermeture>Fermer toutes les fenêtres<input id='checkBox' type='checkbox'></div>";
                    ?><form id="formulaire" method="post" action="Gestion_valeur_piece.php"> <!-- Recharge la page pour faire agir le SQL -->
                            <input id="inputCapteur" type="number" min="0" max="100" name="instruction_capt">%
        
                            <input type="hidden" value=". <?php echo $iddelactionneur;?>" name="id_actionneur">
                            <input type="hidden" value="1" name="donnee">

                            <input type="submit" value="Ouvrir toutes les fenêtres">
                        </form>
                    <?php echo '</div><div id=poubelle><form method=get action=http://localhost/APP/http://localhost/APP/index.php?cible=Gestion_capteurs_piece&fonction=supprimer_capteur><input type="hidden" value=' .$var3.' name="numCapteur"><button id="bouton_supprimer" >
                                Supprimer <img id="picto_supprimer" src="http://localhost/APP/image/icone_poubelle.png" title="supprimer" />
                            </button> 
</form></div></div>';
                }

            }


            

            }

                if(isset($_POST['instruction_capt']) && !empty($_POST['instruction_capt'])){

                    echo 'Instruction prise en compte : '. $_POST['instruction_capt']." °C" ;

                    $requete = $bdd->prepare('INSERT INTO instruction(instruction_capteur,ID_actionneur) VALUES(?,?)');

                    $requete->execute(array($_POST['instruction_capt'],$_POST['id_actionneur']));
                }
                ?>
             </div>
         </div>

        

        

            


        

        <!--Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)-->

        
    

</div>



<?php
include("footer.php");
?>

</body>
</html>
