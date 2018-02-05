<?php

        
    

        function supprimer_capteur($bdd,$num_capteur)
        {
            $req = $bdd ->prepare('DELETE FROM capteur WHERE num_serie =?');
            $req->execute(array( $num_capteur));
        }

        function recup_nom_piece($bdd,$var2)
        {
            $nom_piece=$bdd->prepare('SELECT nom_piece FROM piece WHERE id_piece = ?'); 
            $nom_piece->execute(array($var2));


            return $nom_piece;
        }

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

        function recup_id_capteur($bdd){


            $ID_personne = $_SESSION['ID_personne'];

            $ID_logement = $bdd->prepare('SELECT ID_logement FROM ownerlogment WHERE ID_personnes = ?');
            $ID_logement->execute(array($ID_personne)); // ID logement récupéré
            $ID_logement = $ID_logement->fetch();
            $Var = $ID_logement['ID_logement'];

            $ID_piece = $bdd->prepare('SELECT ID_piece FROM piece WHERE ID_logement = ?');
            $ID_piece->execute(array($Var)); // ID_piece récupérées dans $ID_piece

            $ID_capteur = $bdd->prepare('SELECT num_serie FROM capteur WHERE id_piece = ?');
            $ID_capteur->execute(array('1'));
            return $ID_capteur;
            
        }


        function recup_donee_capteur($bdd,$var3){





            $donnee = $bdd->prepare('SELECT valeur FROM donnee WHERE id_capteur = ?');
            $donnee->execute(array($var3));
            $donnee = $donnee->fetch();
            $donnee = $donnee['valeur'];
            return $donnee;
            
        }

        function recup_nom_capteur($bdd,$var3){

            $nom_capteur = $bdd->prepare('SELECT nom FROM capteur WHERE num_serie = ?');
            $nom_capteur->execute(array($var3));
            $nom_capteur = $nom_capteur->fetch();
            $nom_capt = $nom_capteur['nom'];


            return $nom_capt;            
        }

        function recup_etat_capteur($bdd,$var3){

            $ID_capteur = $bdd->prepare('SELECT num_serie FROM capteur WHERE id_piece = $var2');
            $ID_capteur = $ID_capteur->fetch();
            $idducapteur = $ID_capteur['num_serie'];

            $etat = $bdd->prepare('SELECT etat FROM capteur WHERE num_serie = ?');
            $etat->execute(array($var3));

            $etat = $etat->fetch();
            $etat = $etat['etat'];

            return $etat;

        }

        function recup_ID_actionneur($bdd,$var2){

            $ID_cemac = $bdd->prepare('SELECT ID_CeMAC FROM cemac WHERE ID_piece = $var2');
            $ID_cemac=$ID_cemac->fetch();
            $iddelacemac = $ID_cemac['ID_CeMAC'];


            $ID_actionneur = $bdd->prepare('SELECT ID_actionneur FROM actionneur WHERE ID_CeMAC = ?');
            $ID_actionneur->execute(array($iddelacemac));


            $ID_actionneur = $ID_actionneur->fetch();
            $iddelactionneur = $ID_actionneur['ID_actionneur'];

            return $iddelactionneur;
        }

        function recup_unite_capteur($bdd,$var3){


            $ID_type = $bdd->prepare('SELECT id_type FROM capteur WHERE num_serie = ?');
            $ID_type->execute(array($var3));
            $ID_type = $ID_type->fetch();
            $idtypeducapteur = $ID_type['id_type'];


            $unite = $bdd->prepare('SELECT unite FROM type_capteur WHERE id_type_capteur = ?');
            $unite->execute(array($idtypeducapteur));
            $unite = $unite->fetch();
            $unitecapteur = $unite['unite'];
            return $unitecapteur;
        }

        function recup_id_type_capteur($bdd,$var3){
            $ID_type = $bdd->prepare('SELECT id_type FROM capteur WHERE num_serie = ?');
            $ID_type->execute(array($var3));
            $ID_type = $ID_type->fetch();
            $idtypeducapteur = $ID_type['id_type'];
            return $idtypeducapteur;

        }
?>