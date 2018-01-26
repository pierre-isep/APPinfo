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

if(strlen($login) < 5 || $mdp != $mdp2)
{
    echo "Vous n'avez pas rempli correctement le formulaire !";
}

$bdd->exec("INSERT INTO `compte`(`Nom_personne`,`Prenom`,`tel`,`Email`,`login`,`mot_de_passe`,`ID_typeCompte`) values('".$nom."','".$prenom."',".$tel.",'".$mail."','".$login."','".$mdp."',".$type.")");
include('gestion_utilisateurs.php');

$req = $bdd->prepare('SELECT ID_personne FROM compte WHERE Email = :Email ');
$req->execute(array(
    'Email' => $mail));
$resultat = $req->fetch();

$req = $bdd->prepare('INSERT INTO ownerlogment(ID_personnes) VALUES( :ID_personnes)');

$req->execute(array(
    'ID_personnes' => $resultat['ID_personne']
));
?>