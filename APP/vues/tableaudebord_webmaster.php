
<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
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
  <div id="conteneur_gerer_ma_maison"><div class="titre_ajout"> <p >Liste des utilisateurs de Hometech</p><h6 style="color:skyblue;margin-bottom:2%;"></h6>
<TABLE BORDER="1">
  <CAPTION> liste des news </CAPTION>
  <TR>
 <TH> id </TH>
 <TH> titre </TH>
 <TH> contenu </TH>
 <TH> date </TH>
  </TR>
  
 <?php

 try
        {
            $bdd = new PDO("mysql:host=localhost;dbname=kum'home;charset=utf8", 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }

        // Récupération des 10 derniers messages

     
     
    // On recupere tout le contenu de la table Client
$reponse = $bdd->query('SELECT "Nom_personne","tel" FROM ownerlogment');
  
// On affiche le resultat
while ($donnees = $reponse->fetch())
{?>
    //On affiche l'id et le nom du client en cours
     "</TR>";
     "<TH> $donnees['Nom_personne']</TH>";
     "<TH> $donnees['tel'] </TH>";
   
     "</TR>";
 

   
</TABLE>
</body>
</html>
</div>
     


<br><br>
   <!--<input type="radio" name="suppression" value="oui" href="#" onclick="return goto_confirm('adresse/quelconque');">Oui--><!--<img src="http://icons.iconarchive.com/icons/aha-soft/software/256/cancel-icon.png">-->
   
    
    <!--<input type="submit" onclick="myFunction()" >-->
           <!-- <script>
function myFunction() {
    document.getElementById("demo").innerHTML = "Ajouté";
}
</script>-->

    </fieldset>
    </form>


</div>

</div>



                
                </div></div>
<div id="conteneur_gerer_ma_maison"><div class="titre_ajout"> <p >L'equipe Hometech</p>
<h6 style="color:skyblue;margin-bottom:2%;">......</h6>
</h6></div></div>

</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.switchbtn').click(function()
    {
        $(tdis).toggleClass("switchon");
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