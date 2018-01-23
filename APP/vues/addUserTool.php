<!DOCTYPE html>
    <html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/profil.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>
</head>


<?php

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$login=$_POST['login'];
$mdp=$_POST['mdp1'];
$mdp2=$_POST['mdp2'];
$type=2;
$tel=$_POST['tel'];
$mail=$_POST['mail'];

if(strlen($login) < 5 || $password != $repeat) 
{
    echo "Vous n'avez pas rempli correctement le formulaire !";
}

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=APP2;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
echo $nom,$prenom,$login,$mdp,$type,$tel,$mail;

$bdd->exec("INSERT INTO `compte`(`Nom_personne`,`Prenom`,`tel`,`Email`,`login`,`mot_de_passe`,`ID_typeCompte`) values('".$nom."','".$prenom."',".$tel.",'".$mail."','".$login."','".$mdp."',".$type.")");
include('gestion_utilisateurs.php');
?>