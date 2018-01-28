
<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://localhost/APP/css/style.css">
        <link rel="stylesheet" href="http://localhost/APP/css/footer.css">
        <link rel="stylesheet" href="http://localhost/APP/css/header.css">
        <link rel="stylesheet" href="http://localhost/APP/css/tableaudeborduser.css">
        <link rel="stylesheet" href="http://localhost/APP/css/ton_style_de_base.css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">

        <title>Domisep</title>
       
    </head>
    <body>
<?php

include 'modele/connexion.php';
include("header.php");?>


<div id="section">
  <div id="conteneur_gerer_ma_maison"><div class="titre_ajout"> <p >Etat global : Moyennes statistiques</p><h6 style="color:skyblue;margin-bottom:2%;"></h6>

<h4>

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
                $value=round($moyenne,2);
                $moyenne = round($moyenne,2).' °C';
                echo  '

            

           
            <div class="clearfix">

                <div class="c100 p'.$value.' big">
                    <span><img src="image/temperature.png" style="height:20%;width:20%;margin-left:-10%;padding-right:-50%;float:left;margin-top:-15%"></img>'.$moyenne .'</img></span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>

                ';
?></h4>
<h4>
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
                $value=round($moyenne,2);
                $moyenne = round($moyenne,2).' g/m3';
                
                echo  '


            

           
            <div class="clearfix">

                <div class="c100 p'.$value.' big">
                    <span><img src="image/humide.png" style="height:40%;width:40%;margin-left:-20%;padding-right:-50%;float:left;margin-top:-25%"></img>'.$moyenne .'</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>

                '
?></h4>
<h4>
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
            
?></h4>
                
                </div></div>
<div id="conteneur_gerer_ma_maison"><div class="titre_ajout"> <p >Fonctionnalités</p>
<h6 style="color:skyblue;margin-bottom:2%;">Réglages des capteurs</h6>
<div id="conteneur_titre_capteur" style="width:100%;height:70%;display:flex;flex-direction:inline-block;margin-left:-4%;background-color:white;border:2px solid grey;">

                                <div id="conteneur_etat">
                               <!-- <?php if($nom_capteur['etat']==1)
                                {
                                    ?>
                                    <img id="picto_etat" src="image/button-green.png" title="bon état" />
                                    <?php
                                }
                                else{
                                    ?>
                                    <img id="picto_etat" src="image/button-red.png" title="mauvais état" />
                                    <?php
                                }
                                ?>-->
                                </div>
                            <div id="titre_capteur" style="#:hover : background-color: #000000; "> <?php


                
?>   
                               <a href="index.php?cible=fonctionnalite&fonction=fonction_temp"> <img src="image/temperature.png" style="width:90%;height:10%;margin-top:5%;height:80%;"></img></a>
                            </div>
                            <div id="conteneur_suprimer">
                                <form  method="post" action="index.php?cible=gerermamaison&fonction=supprimer_capteur&id_capteur=<?php echo $nom_capteur['num_serie'] ?>">
                                    <button id="bouton_suprimer" type="submit" >
                                        <img id="picto_supprimer" src="image/icone_poubelle.png" title="suprimer" style="width:120%;height:40%" /><br>
                                        <img id="picto_supprimer" src="image/icone_poubelle.png" title="suprimer" style="width:120%;height:40%"/>
                                    </button>
                                </form>

                            </div><p style="color:#000"><?php 
      $pdo = new PDO("mysql:host=localhost;dbname=kum'home",'root','');
             
             $ID_piece=recup_ID_piece($bdd);
             $total = 0; // initialisation de $total à 0
             $compteur = 0;

    

                while($donne=$ID_piece->fetch()){

                    $var2=$donne['ID_piece'];
                    $idtypeducapteur=recup_id_type_capteur($bdd,$var2);
                     $sql = 'SELECT (id_type) AS nb FROM capteur WHERE id_type=1';
                     $result;
                     
                   if (isset($nb) AND $result=$idtypeducapteur) {
                    $result = $bdd->query($sql);
                    $columns = $result->fetch();
                     $nb = $columns['nb'];
                    
                     }else{$nb=0;}   ;
                   };
                   
                
  echo " Nombre de capteurs Thermiques : ".$nb;

 ?></p>

                        </div>
                        <div id="conteneur_titre_capteur" style="width:100%;height:100%;display:flex;flex-direction:inline-block;margin-left:-4%;background: -webkit-linear-gradient(-45deg, rgba(179,220,237,1) 0%,rgba(41,184,229,1) 50%,rgba(188,224,238,1) 100%);">

                                <div id="conteneur_etat">
                               <!-- <?php if($nom_capteur['etat']==1)
                                {
                                    ?>
                                    <img id="picto_etat" src="image/button-green.png" title="bon état" />
                                    <?php
                                }
                                else{
                                    ?>
                                    <img id="picto_etat" src="image/button-red.png" title="mauvais état" />
                                    <?php
                                }
                                ?>-->
                                </div>
                            <div id="titre_capteur" style="#:hover : background-color: #000000; "> <?php


                
?>   
                              <a href="index.php?cible=fonctionnalite&fonction=fonction_hygro">   <img src="image/humide.png" style="margin-top:5%;width:80%;height:80%"></img></a>
                            </div>
                            <div id="conteneur_suprimer">
                                <form  method="post" action="index.php?cible=gerermamaison&fonction=supprimer_capteur&id_capteur=<?php echo $nom_capteur['num_serie'] ?>">
                                    <button id="bouton_suprimer" type="submit" >
                                        <img id="picto_supprimer" src="image/icone_poubelle.png" title="suprimer" style="width:120%;height:40%" /><br>
                                        <img id="picto_supprimer" src="image/icone_poubelle.png" title="suprimer" style="width:120%;height:40%"/>
                                    </button>
                                </form>

                            </div><p style="color:darkblue"><?php 
      $pdo = new PDO("mysql:host=localhost;dbname=kum'home",'root','');
             
             $ID_piece=recup_ID_piece($bdd);
             $total = 0; // initialisation de $total à 0
             $compteur = 0;

    

                while($donne=$ID_piece->fetch()){

                    $var2=$donne['ID_piece'];
                    $idtypeducapteur=recup_id_type_capteur($bdd,$var2);
                     $sql = 'SELECT (id_type) AS nb FROM capteur WHERE id_type=3';
                     
                     
                   if ($result=$idtypeducapteur) {
                    $result = $bdd->query($sql);
                    $columns = $result->fetch();
                     $nb = $columns['nb']-1;
                    
                     }else{$nb=0;}   ;
                   };
                   
                
  echo " Nombre de capteurs Hygrométriques : ".$nb;

 ?></p>

                        </div>
                        <div id="conteneur_titre_capteur" style="width:100%;height:100%;display:flex;flex-direction:inline-block;margin-left:-4%;background: -webkit-linear-gradient(-45deg, rgba(255,255,136,1) 0%,rgba(255,255,136,1) 100%);">

                                <div id="conteneur_etat">
                               <!-- <?php if($nom_capteur['etat']==1)
                                {
                                    ?>
                                    <img id="picto_etat" src="image/button-green.png" title="bon état" />
                                    <?php
                                }
                                else{
                                    ?>
                                    <img id="picto_etat" src="image/button-red.png" title="mauvais état" />
                                    <?php
                                }
                                ?>-->
                                </div>
                            <div id="titre_capteur" style="#:hover : background-color: #000000; "> <?php


                
?>   
                              <a href="index.php?cible=fonctionnalite&fonction=fonction_lumiere">   <img src="image/light1.png" style="margin-top:9%;width:80%;height:78%"></img></a>
                            </div>
                            <div id="conteneur_suprimer">
                                <form  method="post" action="index.php?cible=gerermamaison&fonction=supprimer_capteur&id_capteur=<?php echo $nom_capteur['num_serie'] ?>">
                                    <button id="bouton_suprimer" type="submit" >
                                        <img id="picto_supprimer" src="image/icone_poubelle.png" title="suprimer" style="width:120%;height:40%" /><br>
                                        <img id="picto_supprimer" src="image/icone_poubelle.png" title="suprimer" style="width:120%;height:40%"/>
                                    </button>
                                </form>

                          
                            </div><p style="color:orange">
                          
<?php 
      $pdo = new PDO("mysql:host=localhost;dbname=kum'home",'root','');
             
             $ID_piece=recup_ID_piece($bdd);
             $total = 0; // initialisation de $total à 0
             $compteur = 0;

    

                while($donne=$ID_piece->fetch()){

                    $var2=$donne['ID_piece'];
                    $idtypeducapteur=recup_id_type_capteur($bdd,$var2);
                     $sql = 'SELECT (id_type) AS nb FROM capteur WHERE id_type=2';
                     
                     
                   if ($result=$idtypeducapteur) {
                    $result = $bdd->query($sql);
                    $columns = $result->fetch();
                     $nb = $columns['nb']-1;
                    
                     }else{$nb=0;}   ;
                   };
                   
                
  echo " Nombre de capteurs Luminosité : ".$nb;

 ?>
                          </p>

                        </div>
   <div id="conteneur_titre_capteur" style="width:100%;height:100%;display:flex;flex-direction:inline-block;margin-left:-4%;background-color:#efefef;">

                                <div id="conteneur_etat">
                               <!-- <?php if($nom_capteur['etat']==1)
                                {
                                    ?>
                                    <img id="picto_etat" src="image/button-green.png" title="bon état" />
                                    <?php
                                }
                                else{
                                    ?>
                                    <img id="picto_etat" src="image/button-red.png" title="mauvais état" />
                                    <?php
                                }
                                ?>-->
                                </div>
                            <div id="titre_capteur" style="#:hover : background-color: #000000; "> <?php


                
?>   
                                <img src="image/mouvement.png" style="margin-top:9%;width:80%;height:78%"></img>
                            </div>
                            <div id="conteneur_suprimer">
                                <form  method="post" action="index.php?cible=gerermamaison&fonction=supprimer_capteur&id_capteur=<?php echo $nom_capteur['num_serie'] ?>">
                                    <button id="bouton_suprimer" type="submit" >
                                        <img id="picto_supprimer" src="image/icone_poubelle.png" title="suprimer" style="width:120%;height:40%" /><br>
                                        <img id="picto_supprimer" src="image/icone_poubelle.png" title="suprimer" style="width:120%;height:40%"/>
                                    </button>
                                </form>

                          
                            </div><p style="color:orange">
                          
<?php 
      $pdo = new PDO("mysql:host=localhost;dbname=kum'home",'root','');
             
             $ID_piece=recup_ID_piece($bdd);
             $total = 0; // initialisation de $total à 0
             $compteur = 0;

    

                while($donne=$ID_piece->fetch()){

                    $var2=$donne['ID_piece'];
                    $idtypeducapteur=recup_id_type_capteur($bdd,$var2);
                     $sql = 'SELECT (id_type) AS nb FROM capteur WHERE id_type=4';
                     
                     
                   if ($result=$idtypeducapteur) {
                    $result = $bdd->query($sql);
                    $columns = $result->fetch();
                     $nb = $columns['nb'];
                    
                     }else{$nb='rien';}   ;
                   };
                   
                
  echo " Nombre de capteurs de contact : ".$nb;

 ?>
                          </p>

                        </div>                     


</div></div>

<div id="conteneur_gerer_ma_maison">
  
     <div id="box">
        <div id="conteneur_gerer_ma_maison">
            <div id="conteneur_ajout"><div class="titre_ajout"> <p >Equiper et gérer avec Hometech</p></div>
               <fieldset> <legend><b class="titre_ajout_">Installation</b></legend><div id="ajout-pièce">
                        <button type="button" id="bouton_ajouter"><a href="index.php?cible=gerermamaison&fonction=gerermamaison"  >
                            Ajouter pièce<a/>
                        </button>
                        <button type="button" id="bouton_ajouter" type="submit" onclick="visibilite('ajout_pièce_caché')" >
                            <img id="picto_plus" src="image/plus.png" title="ajouter" />
                        </button>
                </div>


                <div id="ajout-cemac">
                    <button type="button" id="bouton_ajouter" onclick="visibilite('ajout_cemac_caché')" ><a href="index.php?cible=gerermamaison&fonction=gerermamaison"  >
                        Ajouter cemac</a>
                    </button>
                    <button type="button" id="bouton_ajouter" type="submit" onclick="visibilite('ajout_cemac_caché')" >
                        <img id="picto_plus" src="image/plus.png" title="ajouter" />
                    </button>
                </div>
   
                <div id="ajout-capteur">
                    <button type="button" id="bouton_ajouter" onclick="visibilite('ajout_capteur_caché')" ><a href="index.php?cible=gerermamaison&fonction=gerermamaison"  >
                        Ajouter capteur</a>
                    </button>
                    <button type="button" id="bouton_ajouter" type="submit" onclick="visibilite('ajout_capteur_caché')" >
                        <img id="picto_plus" src="image/plus.png" title="ajouter" />
                    </button>

                </div>
</div></fieldset>
            </div>

            
            <div id="ajout_pièce_caché" style="display: none; " >
                <form id="conteneur_ajout_caché" method="post" action="index.php?cible=gerermamaison&fonction=ajout_piece">
                    <h1>Ajouter pièce </h1>
                    <h2>Choix du type de pièce</h2>
                        <SELECT name="type_piece" size="1">
                            <?php
                            $requete = $bdd->prepare('SELECT type,id_type_piece FROM type_piece');
                            $requete->execute(array());
                            while ($nom_type_piece = $requete->fetch())
                            {
                            ?>
                            <OPTION><?php echo $nom_type_piece['type']; ?>
                                <?php
                                }
                                ?>
                        </SELECT>
                    <h2>Choix du numéro de la piece</h2>
                        <SELECT name="numero" size="1">
                            <OPTION>1
                            <OPTION>2
                            <OPTION>3
                            <OPTION>4
                            <OPTION>5
                            <OPTION>6
                            <OPTION>7
                            <OPTION>8
                            <OPTION>9
                            <OPTION>10
                        </SELECT>
                        </br>
                        <input type="submit" value="Ajouter" /></br>
                </form>
                <button type="button" id="bouton_fermer" type="submit" onclick="invisibilite('ajout_pièce_caché')" >
                    <img id="picto_croix" src="image/croix.png" title="fermer" />
                </button>
            </div>

            <div id="ajout_cemac_caché" style="display: none;" >
                <form id="conteneur_ajout_caché" method="post" action="index.php?cible=gerermamaison&fonction=ajout_cemac">
                    <h1>Ajouter cemac </h1>
                    <h2>Choix de la pièce ou est installé la cemac</h2>
                        <SELECT name="pièce" size="1">
                            <?php
                            $req = $bdd->prepare('SELECT nom_piece,id_piece,numero,id_type_piece FROM piece WHERE id_logement =:id_logement ');
                            $req->execute(array(
                                'id_logement' => $_SESSION['id_logement']));
                            while ($piece = $req->fetch())
                            {
                            $req4 = $bdd->prepare('SELECT type FROM type_piece WHERE id_type_piece = :id_type_piece ');
                            $req4->execute(array(
                                'id_type_piece' => $piece['id_type_piece']));
                            $type_piece = $req4->fetch();
                            ?>
                            <OPTION value="<?php echo $piece['id_piece'];?>"><?php echo $type_piece['type'] .' '. $piece['numero'];?>
                                <?php
                                }
                                ?>
                        </SELECT>
                    </br>
                    <h2>Numéro de série</h2>
                    <label>Numéro de série</label><input class="case-vide" type="text" name="numero"  required/>
                    </br>
                    <input type="submit" value="Ajouter" /></br>
                </form>
                <button type="button" id="bouton_fermer" type="submit" onclick="invisibilite('ajout_cemac_caché')" >
                    <img id="picto_croix" src="image/croix.png" title="fermer" />
                </button>
            </div>

            <div id="ajout_capteur_caché" style="display: none;" >
                <form id="conteneur_ajout_caché" method="post" action="index.php?cible=tableaudeborduser&fonction=ajout_capteur">
                    <h1>Ajouter capteur </h1>
                    <h2>Choix du type de capteur</h2>
                    <SELECT name="type_capteur" size="1">
                        <?php
                        $requete = $bdd->prepare('SELECT nom_type,id_type_capteur FROM type_capteur');
                        $requete->execute(array());
                        while ($nom_type_capteur = $requete->fetch())
                        {
                        ?>
                        <OPTION value="<?php echo $nom_type_capteur['id_type_capteur'];?>"><?php echo $nom_type_capteur['nom_type']; ?>
                            <?php
                            }
                            ?>
                    </SELECT>
                    <h2>Choix de la cemac a laquelle le capteur est associé</h2>
                    <SELECT name="cemac" size="1">
                        <?php
                        $req = $bdd->prepare('SELECT nom_piece,id_piece,numero,id_type_piece FROM piece WHERE id_logement =:id_logement ');
                        $req->execute(array(
                            'id_logement' => $_SESSION['id_logement']));
                        while ($piece = $req->fetch())
                        {
                        $req2 = $bdd->prepare('SELECT numero, ID_CeMAC FROM cemac WHERE ID_piece = :ID_piece ');
                        $req2->execute(array(
                            'ID_piece' => $piece['id_piece']));
                        $numero_cemac = $req2->fetch();
                        ?>
                        <OPTION value="<?php echo $numero_cemac['ID_CeMAC'];?>">Cemac <?php echo $numero_cemac['numero'];?>
                            <?php
                            }
                            ?>
                    </SELECT>
                    </br>
                    <h2>Numéro de série</h2>
                    <label>Numéro de série</label><input class="case-vide" type="text" name="numero"  required/>
                    </br>
                    <input type="submit" value="Ajouter" /></br>
                </form>
                <button type="button" id="bouton_fermer" type="submit" onclick="invisibilite('ajout_capteur_caché')" >
                    <img id="picto_croix" src="image/croix.png" title="fermer" />
                </button>
            </div>





        <?php
        $req = $bdd->prepare('SELECT ID_logement FROM ownerlogment WHERE ID_personnes = :ID_personne ');
        $req->execute(array(
            'ID_personne' => $_SESSION['ID']));
        $resultat = $req->fetch();
        $req = $bdd->prepare('SELECT nom_piece,id_piece,numero,id_type_piece FROM piece WHERE id_logement =:id_logement ');
        $req->execute(array(
            'id_logement' => $resultat['ID_logement']));
        while ($piece = $req->fetch())
        {
            $req4 = $bdd->prepare('SELECT type FROM type_piece WHERE id_type_piece = :id_type_piece ');
            $req4->execute(array(
                'id_type_piece' => $piece['id_type_piece']));
            $type_piece = $req4->fetch();
            ?>
            <legend><b class="titre_ajout_">Gestion de <?php echo  $type_piece['type'] .' '. $piece['numero']; ?></b></legend><div id="conteneur_titre_pièce">
                <div id="titre_piece">
                    <?php echo  $type_piece['type'] .' '. $piece['numero'];?>
                </div>
                <div id="conteneur_suprimer">
                    <form  method="post" action="index.php?cible=gerermamaison&fonction=supprimer_piece&idpiece=<?php echo $piece['id_piece'] ?>">
                        <button id="bouton_suprimer" type="submit"  onclick="deleteme(id)">
                        <img id="picto_supprimer" src="image/icone_poubelle.png" title="suprimer" />
                        </button>
                    </form>
                </div>

            </div>

            <?php
            $req2 = $bdd->prepare('SELECT id_cemac,numero FROM cemac WHERE ID_piece =:id_piece ');
            $req2->execute(array(
                'id_piece' => $piece['id_piece']));
            while ($idcemac = $req2->fetch())
                {
                    ?>
                    <div id="conteneur_titre_cemac">
                        <div id="titre_cemac">
                            <?php echo 'Cemac '. $idcemac['numero']; ?>
                        </div>
                        <div id="conteneur_suprimer">
                            <form  method="post" action="index.php?cible=gerermamaison&fonction=supprimer_cemac&id_cemac=<?php echo $idcemac['id_cemac'] ?>">
                                <button id="bouton_suprimer" type="submit" >
                                    <img id="picto_supprimer" src="image/icone_poubelle.png" title="suprimer" />
                                </button>
                            </form>
                        </div>
                    </div>

                    <?php

                    $req3 = $bdd->prepare('SELECT id_type, num_serie,etat FROM capteur WHERE id_cemac =:id_cemac ');
                    $req3->execute(array(
                        'id_cemac' => $idcemac['id_cemac']));
                    while ($nom_capteur = $req3->fetch())
                    {
                        $req5 = $bdd->prepare('SELECT nom_type FROM type_capteur WHERE id_type_capteur =:id_type_capteur ');
                        $req5->execute(array(
                            'id_type_capteur' => $nom_capteur['id_type']));
                        $titre_capteur = $req5->fetch();

                        ?>
                        <div id="conteneur_titre_capteur">

                                <div id="conteneur_etat">
                                <?php if($nom_capteur['etat']==1)
                                {
                                    ?>
                                    <img id="picto_etat" src="image/button-green.png" title="bon état" />
                                    <?php
                                }
                                else{
                                    ?>
                                    <img id="picto_etat" src="image/button-red.png" title="mauvais état" />
                                    <?php
                                }
                                ?>
                                </div>
                            <div id="titre_capteur">
                                <?php echo 'Capteur '. $titre_capteur['nom_type']; ?>
                            </div>
                            <div id="conteneur_suprimer">
                                <form  method="post" action="index.php?cible=gerermamaison&fonction=supprimer_capteur&id_capteur=<?php echo $nom_capteur['num_serie'] ?>">
                                    <button id="bouton_suprimer" type="submit" >
                                        <img id="picto_supprimer" src="image/icone_poubelle.png" title="suprimer" />
                                    </button>
                                </form>

                            </div>

                        </div>


                        <?php
                    }

                }

        }
        ?>

        </div>
        </div>
</div>

</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.switchbtn').click(function()
    {
        $(this).toggleClass("switchon");
        ;
    });
});
</script>


<script type="text/javascript" src="APP/js/switch.js"></script>
    

    <script language="JavaScript" type="text/javascript">

   function deleteme(id)

    {

      if(confirm("Etes-vous sur de vouloir supprimer cette Cemac ?")) window.location.href = 'deletecemac.php?del_id=' +delid+'';

      return false; //pour ne pas revenir au début de la page

    }
    }

    </script>



   
  </body>
    </html>
    <?php include('footer.php');?>