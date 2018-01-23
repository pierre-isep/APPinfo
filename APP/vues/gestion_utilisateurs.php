<?php
session_start();?>
    <!DOCTYPE html>
    <html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/gestion_utilisateurs.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>
</head>

<?php include("header.php");?>
</br>

<h1> Informations utilisateurs : </h1>
<div id="conteneur-body">

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=APP2;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT ID_personne, Nom_personne, Prenom, ID_typeCompte FROM compte');


echo '<table>
   
   <thead> 
       <tr>
           <th>NOM</th>
           <th>PRÉNOM</th>
           <th>TYPE DE COMPTE</th>
           
       </tr>
    <tfoot> 
       <tr>
           <th colspan="3"><em><a href="addUser.php">Ajouter un utilisateur</a></em></th>
       </tr>
   </tfoot>';
while ($donnees = $reponse->fetch())
{

	echo '<tr>
			<td>'.htmlspecialchars($donnees['Nom_personne']).'</td>
			<td>'.htmlspecialchars($donnees['Prenom']).'</td>
			<td>'.htmlspecialchars($donnees['ID_typeCompte']).'</td>
			
		</tr>';
}

echo '</table';

?>

<?php $reponse->closeCursor(); ?>
</div>
</div>


<?php
include("footer.php");
?>
