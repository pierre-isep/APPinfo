<?php
/*session_start();*/

//inclusion du fichier modèle contenant les appels à la BDD

include 'modele/fonctionnalite.php';

include './controleurs/fonction.php';



$function = $_GET['fonction'];


switch ($function) {

    case 'fonction_temp':
        //affichage de la page fonction_temp.php
        $vue = "fonction_temp";
        $title = "fonction_temp";
        $alerte = false;

        $ID_piece = recup_ID_piece($bdd);
        break;

    case 'fonction_hygro':
        //affichage de la page de la fonction hygro
        $vue = "fonction_hygro";
        $title = "fonction_hygro";
        $alerte = false;

        $ID_piece = recup_ID_piece($bdd);

        break;

    case 'fonction_volets':
        //affichage de la page où l'on peut actionner les volets
        $vue = "fonction_volets";
        $title = "fonction_volets";
        $alerte = false;

        $ID_piece = recup_ID_piece($bdd);

        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";

}



include 'vues/' . $vue . '.php';








?>


