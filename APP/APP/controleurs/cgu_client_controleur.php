<?php
session_start();
// on inclut le fichier modèle contenant les appels à la BDD

include 'modele/connexion.php';
include './controleurs/fonction.php';
require('modele/cgu_client_modele.php');
$reponse = afficherCGU($bdd);
require('vues/cgu_client_vue.php');
?>