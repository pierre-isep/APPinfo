<?php
session_start();
// on inclut le fichier modèle contenant les appels à la BDD

include 'modele/connexion.php';
include 'modele/tableaubord_user.php';
include './controleurs/fonction.php';


$function = $_GET['fonction'];


switch ($function) {

    case 'tableau':
        $vue = "tableaudebord_user";
        $title = "gerer_ma_maison";
        $alerte = false;

        break;

    case 'supprimer_piece':
        $vue = "gerer_ma_maison";
        $title = "gerer_ma_maison";
        $alerte = false;

        if(isset($_GET['idpiece']) && !empty($_GET['idpiece'])) {
            // Si la variable idpiece est passé en GET
            $id_piece = $_GET['idpiece']; //user, sensor, etc.
            supprimer_piece($bdd,$id_piece);}


        break;

    case 'supprimer_cemac':
        $vue = "gerer_ma_maison";
        $title = "gerer_ma_maison";
        $alerte = false;

        if(isset($_GET['id_cemac']) && !empty($_GET['id_cemac'])) {
            // Si la variable idpiece est passé en GET
            $id_cemac = $_GET['id_cemac']; //user, sensor, etc.
            supprimer_cemac($bdd,$id_cemac);}


        break;

    case 'supprimer_capteur':
        $vue = "gerer_ma_maison";
        $title = "gerer_ma_maison";
        $alerte = false;

        if(isset($_GET['id_capteur']) && !empty($_GET['id_capteur'])) {
            // Si la variable idpiece est passé en GET
            $id_capteur = $_GET['id_capteur']; //user, sensor, etc.
            supprimer_capteur($bdd,$id_capteur);}


        break;


    case 'ajout_piece':
        $vue = "tableaudebord_user";
        $title = "tableaudebord_user";
        $alerte = true;

        if (isset($_POST['type_piece']) and isset($_POST['numero']))
        {
            $req = $bdd->prepare('SELECT id_type_piece FROM type_piece WHERE type = :type ');
            $req->execute(array(
                'type' => $_POST['type_piece']));
            $resultat = $req->fetch();
            $req = $bdd->prepare('INSERT INTO piece( id_type_piece, id_logement, nom_piece, numero) VALUES( :id_type_piece, :id_logement, :nom_piece, :numero)');

            $req->execute(array(
                'id_type_piece' => $resultat['id_type_piece'],
                'id_logement' => $_SESSION['id_logement'],
                'nom_piece' => $resultat['id_type_piece'],
                'numero' => $_POST['numero']));
        }


        break;

    case 'ajout_cemac':
        $vue = "gerer_ma_maison";
        $title = "gerer_ma_maison";
        $alerte = false;

        if (isset($_POST['pièce']) and isset($_POST['numero']))
        {
            $req = $bdd->prepare('INSERT INTO cemac( ID_piece, numero) VALUES( :ID_piece, :numero)');

            $req->execute(array(
                'ID_piece' => $_POST['pièce'],
                'numero' => $_POST['numero']));
        }


        break;

    case 'ajout_capteur':
        $vue = "gerer_ma_maison";
        $title = "gerer_ma_maison";
        $alerte = false;

        if (isset($_POST['cemac']) and isset($_POST['type_capteur']) and isset($_POST['numero']))
        {
            $req = $bdd->prepare('SELECT ID_piece FROM cemac WHERE ID_CeMAC = :ID_CeMAC ');
            $req->execute(array(
                'ID_CeMAC' => $_POST['cemac']));
            $piece = $req->fetch();

            $req = $bdd->prepare('SELECT nom_type FROM type_capteur WHERE id_type_capteur = :id_type_capteur ');
            $req->execute(array(
                'id_type_capteur' => $_POST['type_capteur']));
            $type_capteur = $req->fetch();

            $req = $bdd->prepare('SELECT num_serie FROM capteur WHERE id_type = :id_type AND id_piece = :id_piece ');
            $req->execute(array(
                'id_type' => $_POST['type_capteur'],
                'id_piece' => $piece['ID_piece']));
            $existe_deja = $req->fetch();
            if($existe_deja)
            {
                $alerte=true;
            }

            else
            {



                $req = $bdd->prepare('INSERT INTO capteur( num_serie, nom, etat, id_type, id_piece, id_cemac) VALUES( :num_serie, :nom, :etat, :id_type, :id_piece, :id_cemac)');

                $req->execute(array(
                    'num_serie' => $_POST['numero'],
                    'nom' => $type_capteur['nom_type'],
                    'etat' => 1,
                    'id_type' => $_POST['type_capteur'],
                    'id_piece' => $piece['ID_piece'],
                    'id_cemac' => $_POST['cemac']));
            }
        }


        break;






      

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}


include 'vues/' . $vue . '.php';