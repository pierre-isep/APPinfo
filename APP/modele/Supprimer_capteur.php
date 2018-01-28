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




$req = $bdd ->prepare('DELETE FROM capteur WHERE num_serie =?');
$req->execute(array( $_GET['numCapteur']));

// Redirection du visiteur vers la page Gestion_capteurs_piece
header('Location: Gestion_capteurs_piece.php');
?>