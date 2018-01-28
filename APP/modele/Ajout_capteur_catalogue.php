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

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO type_capteur (nom_type, unite, description) VALUES(?,?,?)');
$req->execute(array($_POST['Nom'], $_POST['Unite'],$_POST['Description']));

// Redirection du visiteur vers la page Gestion_capteurs_piece
header('Location: Catalogue.php');
?>



