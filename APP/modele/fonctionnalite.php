<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=kum\'home', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

function recup_ID_actionneur($bdd,$var2){

    $ID_cemac = $bdd->prepare('SELECT ID_cemac FROM cemac WHERE ID_piece = ?');
    $ID_cemac->execute(array($var2));
    $ID_cemac=$ID_cemac->fetch();
    $iddelacemac = $ID_cemac['ID_cemac'];


    $ID_actionneur = $bdd->prepare('SELECT ID_actionneur FROM actionneur WHERE ID_cemac = ?');
    $ID_actionneur->execute(array($iddelacemac));


    $ID_actionneur = $ID_actionneur->fetch();
    $iddelactionneur = $ID_actionneur['ID_actionneur'];

    return $iddelactionneur;
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

function recup_etat_capteur_temp($bdd,$var2){

    $ID_capteur = $bdd->prepare('SELECT num_serie FROM capteur WHERE id_piece = ? AND id_type = 1');
    $ID_capteur->execute(array($var2));
    $ID_capteur = $ID_capteur->fetch();
    $idducapteur = $ID_capteur['num_serie'];

    $etat = $bdd->prepare('SELECT etat FROM capteur WHERE num_serie = ?');
    $etat->execute(array($idducapteur));

    $etat = $etat->fetch();
    $etat = $etat['etat'];

    return $etat;

}

function recup_etat_capteur_hygro($bdd,$var2){

    $ID_capteur = $bdd->prepare('SELECT num_serie FROM capteur WHERE id_piece = ? AND id_type = 3');
    $ID_capteur->execute(array($var2));
    $ID_capteur = $ID_capteur->fetch();
    $idducapteur = $ID_capteur['num_serie'];

    $etat = $bdd->prepare('SELECT etat FROM capteur WHERE num_serie = ?');
    $etat->execute(array($idducapteur));

    $etat = $etat->fetch();
    $etat = $etat['etat'];

    return $etat;

}


function recup_donnee_capteur_hygro($bdd,$var2)
{
    $ID_capteur = $bdd->prepare('SELECT num_serie FROM capteur WHERE id_piece = ? AND id_type = 3');
    $ID_capteur->execute(array($var2));
    $ID_capteur = $ID_capteur->fetch();
    $idducapteur = $ID_capteur['num_serie'];


    $donnee = $bdd->prepare('SELECT valeur FROM donnee WHERE id_capteur = ?');
    $donnee->execute(array($idducapteur));
    $donnee = $donnee->fetch();
    $donnee = $donnee['valeur'];

    return $donnee;
}

function moyenne($donnee,$total){

    $total = $donnee + $total;

    return $total;


}









?>

