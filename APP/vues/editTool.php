<?php
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$login=$_POST['login'];
$mdp=$_POST['mdp1'];
$mdp2=$_POST['mdp2'];
$type=$_POST['typeCompte'];
$tel=$_POST['tel'];
$mail=$_POST['mail'];
$id=$_SESSION['ID_personne'];
/*try
{
    $bdd = new PDO('mysql:host=localhost;dbname=APP2;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
} */

$bdd='UPDATE `compte` SET `Nom_personne`="'.$nom.'",`Prenom`=$prenom,`tel`=$tel,`Email`=$mail,`login`=$login,`mot_de_passe`=$mdp,`ID_typeCompte`=[value-8] WHERE `ID_personne`= .$id.';


include('parametres.php');
?>