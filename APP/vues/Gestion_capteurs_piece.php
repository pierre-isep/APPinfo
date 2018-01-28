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

        
        <h1>Salle de bain</h1>
        <div id="Ajout_capteur">
            <strong>Ajouter capteur</strong><br/><br/>
            <form action="Ajout_capteur.php" method="post">
                 <label value="Nom">Nom du capteur :</label>
                 <select name="Nom">
                 <option value="Humidite">Humidité</option>
                 <option value="Temperature">Température</option>
                 <option value="Fenetre">Fenêtre</option>
                 <option value="Fumee">Fumée</option>
                 </select><br>
                 <input type="hidden" value="<?php echo $ID_Piece;?>" name="id_piece">
                 <label for="valeur">Valeur voulue : </label><input type="number" max="100" min="0" step="1"/><br>
                 <input type="submit" value="valider">
            </form>
        </div>
        

        
        <?php
        // Connexion à la base de données
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=kum\'home', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }

        // Récupération des 10 derniers messages
        $reponse = $bdd->query('SELECT * FROM capteur');

        function recup_nom_piece($bdd,$var2)
        {
            $nom_piece=$bdd->prepare('SELECT nom_piece FROM piece WHERE id_piece = ?'); 
            $nom_piece->execute(array($var2));


            return $nom_piece;
        }

        function recup_ID_piece($bdd)
        {

            $ID_personne = $_SESSION['ID_personne'];

            $ID_logement = $bdd->prepare('SELECT ID_logement FROM ownerlogment WHERE ID_personnes = ?');
            $ID_logement->execute(array($ID_personne)); // ID logement récupéré
            $ID_logement = $ID_logement->fetch();
            $Var = $ID_logement['ID_logement'];

            $ID_piece = $bdd->prepare('SELECT ID_piece FROM piece WHERE ID_logement = ?');
            $ID_piece->execute(array($Var)); // ID_piece récupérées dans $ID_piece

            return $ID_piece;

        }

        function recup_id_capteur($bdd){


            $ID_personne = $_SESSION['ID_personne'];

            $ID_logement = $bdd->prepare('SELECT ID_logement FROM ownerlogment WHERE ID_personnes = ?');
            $ID_logement->execute(array($ID_personne)); // ID logement récupéré
            $ID_logement = $ID_logement->fetch();
            $Var = $ID_logement['ID_logement'];

            $ID_piece = $bdd->prepare('SELECT ID_piece FROM piece WHERE ID_logement = ?');
            $ID_piece->execute(array($Var)); // ID_piece récupérées dans $ID_piece

            $ID_capteur = $bdd->prepare('SELECT num_serie FROM capteur WHERE id_piece = ?');
            $ID_capteur->execute(array('1'));
            return $ID_capteur;
            
        }


        function recup_donee_capteur($bdd,$var3){





            $donnee = $bdd->prepare('SELECT valeur FROM donnee WHERE id_capteur = ?');
            $donnee->execute(array($var3));
            $donnee = $donnee->fetch();
            $donnee = $donnee['valeur'];
            return $donnee;
            
        }

        function recup_nom_capteur($bdd,$var3){

            $nom_capteur = $bdd->prepare('SELECT nom FROM capteur WHERE num_serie = ?');
            $nom_capteur->execute(array($var3));
            $nom_capteur = $nom_capteur->fetch();
            $nom_capt = $nom_capteur['nom'];


            return $nom_capt;            
        }

        function recup_etat_capteur($bdd,$var3){

            $ID_capteur = $bdd->prepare('SELECT num_serie FROM capteur WHERE id_piece = $var2');
            $ID_capteur = $ID_capteur->fetch();
            $idducapteur = $ID_capteur['num_serie'];

            $etat = $bdd->prepare('SELECT etat FROM capteur WHERE num_serie = ?');
            $etat->execute(array($var3));

            $etat = $etat->fetch();
            $etat = $etat['etat'];

            return $etat;

        }

        function recup_ID_actionneur($bdd,$var2){

            $ID_cemac = $bdd->prepare('SELECT ID_cemac FROM cemac WHERE ID_piece = $var2');
            $ID_cemac=$ID_cemac->fetch();
            $iddelacemac = $ID_cemac['ID_cemac'];


            $ID_actionneur = $bdd->prepare('SELECT ID_actionneur FROM actionneur WHERE ID_cemac = ?');
            $ID_actionneur->execute(array($iddelacemac));


            $ID_actionneur = $ID_actionneur->fetch();
            $iddelactionneur = $ID_actionneur['ID_actionneur'];

            return $iddelactionneur;
        }

        function recup_unite_capteur($bdd,$var3){


            $ID_type = $bdd->prepare('SELECT id_type FROM capteur WHERE num_serie = ?');
            $ID_type->execute(array($var3));
            $ID_type = $ID_type->fetch();
            $idtypeducapteur = $ID_type['id_type'];


            $unite = $bdd->prepare('SELECT unite FROM type_capteur WHERE id_type_capteur = ?');
            $unite->execute(array($idtypeducapteur));
            $unite = $unite->fetch();
            $unitecapteur = $unite['unite'];
            return $unitecapteur;
        }

        function recup_id_type_capteur($bdd,$var3){
            $ID_type = $bdd->prepare('SELECT id_type FROM capteur WHERE num_serie = ?');
            $ID_type->execute(array($var3));
            $ID_type = $ID_type->fetch();
            $idtypeducapteur = $ID_type['id_type'];
            return $idtypeducapteur;

        }

        
        $ID_capteur = recup_id_capteur($bdd);
        $ID_piece = '1';

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
                        <div id="conteneur_formulaire"><label id="Valeure_cible">Valeure cible :</label>
                            <form id="formulaire" method="post" action=""> <!-- Recharge la page pour faire agir le SQL -->
                                <input id="inputCapteur" type="number" min="12" max="30" name="instruction_capt">°C

                                <input type="hidden" value="<?php echo $iddelactionneur;?>" name="id_actionneur">  <!-- On va chercher les id actionneurs qu'on associe à leur piece de cette manière -->
                                <input type="submit" value="Envoyer">
                            </form>
                        </div>

                    </ul>
                <?php echo '</div><div id=poubelle><a href=Supprimer_capteur.php?numCapteur='.$var3.'><button id="bouton_supprimer" >
                                Supprimer <img id="picto_supprimer" src="http://localhost/APP/image/icone_poubelle.png" title="supprimer" />
                            </button>'?>
</a></div>
            </div>
           

            <?php
            }

            if ($idtypeducapteur==2){

                ?>
                <div id="conteneur-liste">
                    <ul id="Liste_pieces_fonction_temp">

                        <li><?php echo '<Strong>Luminosité</Strong>'. " : ". $donneeducapteur." ".$unitecapteur?></li>
                        <div id="conteneur_formulaire"><label id="Valeure_cible">Valeure cible :</label>
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
                    echo'</div><div id=poubelle><a href=Supprimer_capteur.php?numCapteur='.$var3.'><button id="bouton_supprimer" >
                                Supprimer <img id="picto_supprimer" src="http://localhost/APP/image/icone_poubelle.png" title="supprimer" />
                            </button> 
</a></div></div>';
                }
                else{
                    echo 'Les lumières sont allumées<br/>';
                    echo    '<form id="formulaire" method="post" action=""> <!-- Recharge la page pour faire agir le SQL -->
                                <input id="inputCapteur" type="hidden" value="1" name="instruction_capt">

                                <input type="hidden" value='.$iddelactionneur.' name="id_actionneur"> 
                                <input type="submit" value="Eteindre les lumières">
                            </form>';
                    echo '</div><div id=poubelle><a href=Supprimer_capteur.php?numCapteur='.$var3.'><button id="bouton_supprimer" >
                                Supprimer <img id="picto_supprimer" src="http://localhost/APP/image/icone_poubelle.png" title="supprimer" />
                            </button> 
</a></div></div>';
                }

            }

            if ($idtypeducapteur==3){

                ?>
                <div id="conteneur-liste">
                    <ul id="Liste_pieces_fonction_temp">

                        <li><?php echo '<Strong>Humidité</Strong>'. " : ". $donneeducapteur." ".$unitecapteur?></li>
                        <div id="conteneur_formulaire"><label id="Valeure_cible">Valeure cible :</label>
                            <form id="formulaire" method="post" action=""> <!-- Recharge la page pour faire agir le SQL -->
                                <input id="inputCapteur" type="number" min="0" max="100" name="instruction_capt">g/m^3

                                <input type="hidden" value="<?php echo $iddelactionneur;?>" name="id_actionneur">  <!-- On va chercher les id actionneurs qu'on associe à leur piece de cette manière -->
                                <input type="submit" value="Envoyer">
                            </form>
                        </div>
                    </ul>
                <?php echo'</div><div id=poubelle><a href=Supprimer_capteur.php?numCapteur='.$var3.'><button id="bouton_supprimer" >
                                Supprimer <img id="picto_supprimer" src="http://localhost/APP/image/icone_poubelle.png" title="supprimer" />
                            </button>'?>

</a></div>
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
                        <div id=poubelle><a href=Supprimer_capteur.php?numCapteur='.$var3.'><button id="bouton_supprimer" >
                                Supprimer <img id="picto_supprimer" src="http://localhost/APP/image/icone_poubelle.png" title="supprimer" />
                            </button> 
</a></div></div>';
                }
                else{
                    echo $iddelactionneur."Les fenêtres sont ouvertes<div class=Fermeture>Fermer toutes les fenêtres<input id='checkBox' type='checkbox'></div>";
                    ?><form id="formulaire" method="post" action="Gestion_valeur_piece.php"> <!-- Recharge la page pour faire agir le SQL -->
                            <input id="inputCapteur" type="number" min="0" max="100" name="instruction_capt">%
        
                            <input type="hidden" value=". <?php echo $iddelactionneur;?>" name="id_actionneur">
                            <input type="hidden" value="1" name="donnee">

                            <input type="submit" value="Ouvrir toutes les fenêtres">
                        </form>
                    <?php echo '</div><div id=poubelle><a href=Supprimer_capteur.php?numCapteur='.$var3.'><button id="bouton_supprimer" >
                                Supprimer <img id="picto_supprimer" src="http://localhost/APP/image/icone_poubelle.png" title="supprimer" />
                            </button> 
</a></div></div>';
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
