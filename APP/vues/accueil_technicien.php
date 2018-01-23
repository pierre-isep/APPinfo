 <!DOCTYPE html>
    <html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/APP/css/style.css">
    <link rel="stylesheet" href="http://localhost/APP/css/footer.css">
    <link rel="stylesheet" href="http://localhost/APP/css/header.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>
</head>
<body>
<?php include("header.php");?>

<div id="section">
    <div id="conteneur_general_pannes">
        <?php
        $requete = $bdd->prepare('SELECT id_panne,id_personne,num_serie_capteur,num_serie_cemac,description FROM panne WHERE id_personne =:id_personne');
        $requete->execute(array('id_personne' => $_SESSION['ID']));
        while ($panne = $requete->fetch())
        {
            if ($panne['num_serie_capteur']!=0)
            {
                $req = $bdd->prepare('SELECT id_type,id_piece FROM capteur WHERE num_serie =:num_serie');
                $req->execute(array('num_serie' => $panne['num_serie_capteur']));
                $capteur = $req->fetch();
                $req = $bdd->prepare('SELECT nom_type FROM type_capteur WHERE id_type_capteur =:id_type_capteur');
                $req->execute(array('id_type_capteur' => $capteur['id_type']));
                $nom_capteur = $req->fetch();
                $req = $bdd->prepare('SELECT id_logement FROM piece WHERE id_piece =:id_piece');
                $req->execute(array('id_piece' => $capteur['id_piece']));
                $resultat = $req->fetch();
                $req = $bdd->prepare('SELECT ID_personnes FROM ownerlogment WHERE ID_logement =:ID_logement');
                $req->execute(array('ID_logement' => $resultat['id_logement']));
                $resultat = $req->fetch();
                $req = $bdd->prepare('SELECT Nom_personne,Prenom,tel,Email FROM compte WHERE ID_personne =:ID_personne');
                $req->execute(array('ID_personne' => $resultat['ID_personnes']));
                $personne = $req->fetch();


                ?>
                <div id="conteneur_panne">
                    <p><?php echo $personne['Prenom'].' '.$personne['Nom_personne'].' : téléphone : '.$personne['tel'].' : E-mail : '.$personne['Email'] ?></p>
                    <br>
                    <p><?php echo 'Sujet de la panne : capteur de '.$nom_capteur['nom_type'].' : '.$panne['num_serie_capteur'] ?></p>
                    <br>
                    <div id="description">
                    <p><?php echo 'Description : '.$panne['description'] ?></p>
                    </div>
                    <div id="bouton_validation_panne"
                    <form  method="post" action="index.php?cible=tableau_de_bord_technicien&fonction=validation_panne_capteur&id_panne=<?php echo $panne['id_panne']?>">
                        <button id="bouton_suprimer" type="submit" >
                            Valider la résolution de la panne
                        </button>
                    </form>
                    </div>
                </div>


                <?php

            }
            else
            {
                $req = $bdd->prepare('SELECT id_piece FROM cemac WHERE ID_CeMAC =:ID_CeMAC');
                $req->execute(array('ID_CeMAC' => $panne['num_serie_cemac']));
                $capteur = $req->fetch();
                $req = $bdd->prepare('SELECT id_logement FROM piece WHERE id_piece =:id_piece');
                $req->execute(array('id_piece' => $capteur['id_piece']));
                $resultat = $req->fetch();
                $req = $bdd->prepare('SELECT ID_personnes FROM ownerlogment WHERE ID_logement =:ID_logement');
                $req->execute(array('ID_logement' => $resultat['id_logement']));
                $resulat = $req->fetch();
                $req = $bdd->prepare('SELECT Nom_personne,Prenom,tel,Email FROM compte WHERE ID_personne =:ID_personne');
                $req->execute(array('ID_personne' => $resultat['ID_personnes']));
                $personne = $req->fetch();


                ?>
                <div id="conteneur_panne">
                    <p><?php echo $personne['Prenom'].' '.$personne['Nom_personne'].' : téléphone : '.$personne['tel'].' : E-mail : '.$personne['Email'] ?></p>
                    <br>
                    <p><?php echo 'Sujet de la panne : cemac : '.$panne['num_serie_cemac'] ?></p>
                    <br>
                    <div id="description">
                        <p><?php echo 'Description : '.$panne['description'] ?></p>
                    </div>
                    <div id="bouton_validation_panne"
                    <form  method="post" action="index.php?cible=tableau_de_bord_technicien&fonction=validation_panne_capteur&id_panne=<?php echo $panne['id_panne']?>">
                        <button id="bouton_suprimer" type="submit" >
                            Valider la résolution de la panne
                        </button>
                    </form></div>

                </div>


                <?php
            }

        }
        ?>

    </div>














</div>


<?php
include("footer.php");
?>

</body>
</html>