<?php
session_start();
// on inclut le fichier modèle contenant les appels à la BDD

include 'modele/connexion.php';
include './controleurs/fonction.php';
require('modele/cgu_client_modele.php');
$reponse = afficherCGU($bdd);
$function = $_GET['fonction'];


switch ($function) {

    case 'accueil':
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "cgu_non_connecte_vue";
        $title = "cgu";
        $alerte = false;

        break;

    case 'client':
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "cgu_client_vue";
        $title = "cgu";
        $alerte = false;

        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include 'vues/' . $vue . '.php';
