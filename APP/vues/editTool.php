<?php
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$login=$_POST['login'];
$mdp=$_POST['mdp1'];
$mdp2=$_POST['mdp2'];
$type=$_POST['typeCompte'];
$tel=$_POST['tel'];
$mail=$_POST['mail'];

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=APP2;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
echo $nom,$prenom,$login,$mdp,$type,$tel,$mail;

$bdd->exec("UPDATE `compte` set  `Nom_personne`='".$nom."',`Prenom`='".$prenom."',`tel`='".$tel."', `Email`='".$mail."',`login`='".$login."',`mot_de_passe`='".$mdp."',`ID_typeCompte`=".$type." WHERE ID_personne=2");
include('parametres.php');
?>