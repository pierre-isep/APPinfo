<?php
session_start();
// on inclut le fichier modèle contenant les appels à la BDD

include 'modele/connexion.php';
include 'modele/gestion_panne.php';
include './controleurs/fonction.php';


$function = $_GET['fonction'];


switch ($function) {

    case 'accueil':
        $vue = "accueil_technicien";
        $title = "accueil_technicien";
        $alerte = false;

        break;

    case 'validation_panne_cemac':
        $vue = "accueil_technicien";
        $title = "accueil_technicien";
        $alerte = false;
        if(isset($_GET['id_panne']) && !empty($_GET['id_panne'])) {
            $req = $bdd->prepare('SELECT num_serie_cemac FROM panne WHERE id_panne =:id_panne');
            $req->execute(array('id_panne' => $_GET['id_panne']));
            $capteur = $req->fetch();
            $req = $bdd->prepare('UPDATE `cemac` SET `etat`=1 WHERE ID_CeMAC =:ID_CeMAC ');
            $req->execute(array('ID_CeMAC' => $capteur['num_serie_cemac']));
            $id_panne = $_GET['id_panne']; //user, sensor, etc.
            supprimer_panne($bdd,$id_panne);
        }

        break;

    case 'validation_panne_capteur':
        $vue = "accueil_technicien";
        $title = "accueil_technicien";
        $alerte = false;
        if(isset($_GET['id_panne']) && !empty($_GET['id_panne'])) {
            $req = $bdd->prepare('SELECT num_serie_capteur FROM panne WHERE id_panne =:id_panne');
            $req->execute(array('id_panne' => $_GET['id_panne']));
            $capteur = $req->fetch();
            $req = $bdd->prepare('UPDATE `capteur` SET `etat`=1 WHERE num_serie =:num_serie ');
            $req->execute(array('num_serie' => $capteur['num_serie_capteur']));
            $id_panne = $_GET['id_panne']; //user, sensor, etc.
            supprimer_panne($bdd,$id_panne);
        }

        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}


include 'vues/' . $vue . '.php';

