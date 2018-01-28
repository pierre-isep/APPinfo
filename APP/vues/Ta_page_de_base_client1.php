
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=kum\'home', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


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

function recup_donnee_capteur_temp($bdd,$var2){


    $ID_capteur = $bdd->prepare('SELECT num_serie FROM capteur WHERE id_piece = ? AND id_type = 1');
    $ID_capteur->execute(array($var2));
    $ID_capteur = $ID_capteur->fetch();
    $idducapteur = $ID_capteur['num_serie'];


    $donnee = $bdd->prepare('SELECT valeur FROM donnee WHERE id_capteur = ?');
    $donnee->execute(array($idducapteur));
    $donnee = $donnee->fetch();
    $donnee = $donnee['valeur'];


    return $donnee;
}

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
    <!DOCTYPE html>
    <html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/APP/css/style.css">
     <link rel="stylesheet" href="http://localhost/APP/css/Ta_page_de_base_client.css">
    <link rel="stylesheet" href="http://localhost/APP/css/footer.css">
    <link rel="stylesheet" href="http://localhost/APP/css/header.css">
    <link rel="stylesheet" href="http://localhost/APP/css/ton_style_de_base.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>

  
</head>
<body>
<?php include("header.php");?>

<div id="conteneur-body">

<div id="contenu"><h1>Vue d'ensemble</h1><br>


<?php echo $moyenne;?>


<!--
  <a href="#" role="button">Ajouter</a><br><br>--><br><br>

<a href="#" role="button">Supprimer</a><br><br><br><style>
a[role="button"] {
  color: #fff;
  padding: .7em;
  background-color: #428bca;
  border: solid 1px #357ebd;
  line-height:2.2em;
  text-decoration: none;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  -webkit-transition-duration: 0.2s;
  -moz-transition-duration: 0.2s;
  transition-duration: 0.2s;
}
 
a[role="button"]:hover, [role="button"].bouton:focus {
  color: #fff;
  background-color: #3071a9;
  border: solid 1px #285e8e;
  text-decoration: none;
}
 
a[role="button"]:active {
  color: #fff;
  background-color: #3071a9;
  border: solid 1px #12314c;
}
</style></div>

<div id="contenu"><h1>Fonctionnalités</h1></button>
	<script type="text/javascript">
	
function validateForm() {var x = document.forms["myForm"]["nom"].value;
if(x == "") {alert("Le nom est vide");
return false;    }}
function
 show() {alert("Hi there");}
</script>

</script>
</div>
<div id="contenu">
	<?php
        // Connexion à la base de données
        try
        {
            $bdd = new PDO("mysql:host=localhost;dbname=kum'home;charset=utf8", 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }

        // Récupération des 10 derniers messages
        $reponse = $bdd->query('SELECT * FROM piece');

        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

      


        $reponse->closeCursor();

    ?>
	<form name="myform" onsubmit="return validateForm()" method="post" action="Ajout.php">
	<fieldset><legend>Installation-désinstallation d'une Pièce</legend>
	<br>
	 <input type="text" name="choisir" placeholder="Choix de la pièce" list="choix" required>
        <datalist id="choix">
        <option value>Salon</option>
        <option>Séjour</option>
        <option>Cuisine</option>
        <option>Chambre</option>
        <option>Garage</option>
         <option>Supprimer</option>
        </datalist>
        <input placeholder="Numéro de pièce" type="number" name="numero"  min="0" max="8" required="Champ requis">
  <input type="submit" name="ajout" id="oui"checked="checked"  value="Ajouter"/></form>
     <br><br>
   

    <div name="Choix_piece_a_supprimer">

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


    <script language="JavaScript" type="text/javascript">

    function goto_confirm(url)

    {

      if(confirm("Etes-vous sur de vouloir supprimer cette pièce ?")) document.location.href = url;

      return false; //pour ne pas revenir au début de la page

    }

    </script>

   
</body>
<?php
include("footer.php");?>