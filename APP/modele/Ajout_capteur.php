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

// Insertion du message à l'aide d'une requête préparée
if ($_POST['Nom']=="Temperature"){
	$id_type=1;
}
if ($_POST['Nom']=="Luminosite"){
	$id_type=2;
}
if ($_POST['Nom']=="Humidite"){
	$id_type=3;
}
if ($_POST['Nom']=="Fenetre"){
	$id_type=4;
}
$req = $bdd->prepare('INSERT INTO capteur (nom, etat,id_type,id_piece, id_cemac) VALUES(?,?,?,?,?)');
$req->execute(array($_POST['Nom'],'1',$id_type,$_POST['id_piece'],'0'));

$nom=$_POST['Nom'];

function recup_id_capteur($bdd,$nom){


    $ID_capteur = $bdd->prepare('SELECT num_serie FROM capteur WHERE nom = ?');
    $ID_capteur->execute(array($nom));
    $ID_capteur=$ID_capteur['num_serie'];
    return $ID_capteur;
            
}

$ID_capteur=recup_id_capteur($bdd,$nom);


$req2 = $bdd->prepare('INSERT INTO donnee (id_capteur, valeur) VALUES(?,?)');
$req2->execute(array($ID_capteur,$_POST['valeur']));
// Redirection du visiteur vers la page Gestion_capteurs_piece
header('Location: Gestion_capteurs_piece.php');
?>



