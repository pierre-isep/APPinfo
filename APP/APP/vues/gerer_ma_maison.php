
    <!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://localhost/APP/css/style.css">
        <link rel="stylesheet" href="http://localhost/APP/css/footer.css">
        <link rel="stylesheet" href="http://localhost/APP/css/header.css">
        <link rel="stylesheet" href="http://localhost/APP/css/gerer_ma_maison.css">

        <title>Domisep</title>
    </head>
    <body>
<?php
include 'modele/connexion.php';
include("header.php");?>

    <div id="section">
        <div id="conteneur_gerer_ma_maison">
            <div id="conteneur_ajout">
                <div id="ajout-pièce">
                        <button type="button" id="bouton_ajouter" onclick="visibilite('ajout_pièce_caché')" >
                            Ajouter pièce
                        </button>
                        <button type="button" id="bouton_ajouter" type="submit" onclick="visibilite('ajout_pièce_caché')" >
                            <img id="picto_plus" src="image/plus.png" title="ajouter" />
                        </button>
                </div>


                <div id="ajout-cemac">
                    <button type="button" id="bouton_ajouter" onclick="visibilite('ajout_cemac_caché')" >
                        Ajouter cemac
                    </button>
                    <button type="button" id="bouton_ajouter" type="submit" onclick="visibilite('ajout_cemac_caché')" >
                        <img id="picto_plus" src="image/plus.png" title="ajouter" />
                    </button>
                </div>

                <div id="ajout-capteur">
                    <button type="button" id="bouton_ajouter" onclick="visibilite('ajout_capteur_caché')" >
                        Ajouter capteur
                    </button>
                    <button type="button" id="bouton_ajouter" type="submit" onclick="visibilite('ajout_capteur_caché')" >
                        <img id="picto_plus" src="image/plus.png" title="ajouter" />
                    </button>
                </div>
            </div>

            <div id="ajout_pièce_caché" style="display: none; " >
                <form id="conteneur_ajout_caché" method="post" action="index.php?cible=gerermamaison&fonction=ajout_piece">
                    <h1>Ajouter pièce </h1>
                    <h2>Choix du type de pièce</h2>
                        <SELECT name="type_piece" size="1">
                            <?php
                            $requete = $bdd->prepare('SELECT type,id_type_piece FROM type_piece');
                            $requete->execute(array());
                            while ($nom_type_piece = $requete->fetch())
                            {
                            ?>
                            <OPTION><?php echo $nom_type_piece['type']; ?>
                                <?php
                                }
                                ?>
                        </SELECT>
                    <h2>Choix du numéro de la piece</h2>
                        <SELECT name="numero" size="1">
                            <OPTION>1
                            <OPTION>2
                            <OPTION>3
                            <OPTION>4
                            <OPTION>5
                            <OPTION>6
                            <OPTION>7
                            <OPTION>8
                            <OPTION>9
                            <OPTION>10
                        </SELECT>
                        </br>
                        <input type="submit" value="Ajouter" /></br>
                </form>
                <button type="button" id="bouton_fermer" type="submit" onclick="invisibilite('ajout_pièce_caché')" >
                    <img id="picto_croix" src="image/croix.png" title="fermer" />
                </button>
            </div>

            <div id="ajout_cemac_caché" style="display: none;" >
                <form id="conteneur_ajout_caché" method="post" action="index.php?cible=gerermamaison&fonction=ajout_cemac">
                    <h1>Ajouter cemac </h1>
                    <h2>Choix de la pièce ou est installé la cemac</h2>
                        <SELECT name="pièce" size="1">
                            <?php
                            $req = $bdd->prepare('SELECT nom_piece,id_piece,numero,id_type_piece FROM piece WHERE id_logement =:id_logement ');
                            $req->execute(array(
                                'id_logement' => $_SESSION['id_logement']));
                            while ($piece = $req->fetch())
                            {
                            $req4 = $bdd->prepare('SELECT type FROM type_piece WHERE id_type_piece = :id_type_piece ');
                            $req4->execute(array(
                                'id_type_piece' => $piece['id_type_piece']));
                            $type_piece = $req4->fetch();
                            ?>
                            <OPTION value="<?php echo $piece['id_piece'];?>"><?php echo $type_piece['type'] .' '. $piece['numero'];?>
                                <?php
                                }
                                ?>
                        </SELECT>
                    </br>
                    <h2>Numéro de série</h2>
                    <label>Numéro de série</label><input class="case-vide" type="text" name="numero"  required/>
                    </br>
                    <input type="submit" value="Ajouter" /></br>
                </form>
                <button type="button" id="bouton_fermer" type="submit" onclick="invisibilite('ajout_cemac_caché')" >
                    <img id="picto_croix" src="image/croix.png" title="fermer" />
                </button>
            </div>

            <div id="ajout_capteur_caché" style="display: none;" >
                <form id="conteneur_ajout_caché" method="post" action="index.php?cible=gerermamaison&fonction=ajout_capteur">
                    <h1>Ajouter cemac </h1>
                    <h2>Choix du type de capteur</h2>
                    <SELECT name="type_capteur" size="1">
                        <?php
                        $requete = $bdd->prepare('SELECT nom_type,id_type_capteur FROM type_capteur');
                        $requete->execute(array());
                        while ($nom_type_capteur = $requete->fetch())
                        {
                        ?>
                        <OPTION value="<?php echo $nom_type_capteur['id_type_capteur'];?>"><?php echo $nom_type_capteur['nom_type']; ?>
                            <?php
                            }
                            ?>
                    </SELECT>
                    <h2>Choix de la cemac a laquelle le capteur est associé</h2>
                    <SELECT name="cemac" size="1">
                        <?php
                        $req = $bdd->prepare('SELECT nom_piece,id_piece,numero,id_type_piece FROM piece WHERE id_logement =:id_logement ');
                        $req->execute(array(
                            'id_logement' => $_SESSION['id_logement']));
                        while ($piece = $req->fetch())
                        {
                        $req2 = $bdd->prepare('SELECT numero, ID_CeMAC FROM cemac WHERE ID_piece = :ID_piece ');
                        $req2->execute(array(
                            'ID_piece' => $piece['id_piece']));
                        $numero_cemac = $req2->fetch();
                        ?>
                        <OPTION value="<?php echo $numero_cemac['ID_CeMAC'];?>">Cemac <?php echo $numero_cemac['numero'];?>
                            <?php
                            }
                            ?>
                    </SELECT>
                    </br>
                    <h2>Numéro de série</h2>
                    <label>Numéro de série</label><input class="case-vide" type="text" name="numero"  required/>
                    </br>
                    <input type="submit" value="Ajouter" /></br>
                </form>
                <button type="button" id="bouton_fermer" type="submit" onclick="invisibilite('ajout_capteur_caché')" >
                    <img id="picto_croix" src="image/croix.png" title="fermer" />
                </button>
            </div>





        <?php
        $req = $bdd->prepare('SELECT ID_logement FROM ownerlogment WHERE ID_personnes = :ID_personne ');
        $req->execute(array(
            'ID_personne' => $_SESSION['ID']));
        $resultat = $req->fetch();
        $req = $bdd->prepare('SELECT nom_piece,id_piece,numero,id_type_piece FROM piece WHERE id_logement =:id_logement ');
        $req->execute(array(
            'id_logement' => $resultat['ID_logement']));
        while ($piece = $req->fetch())
        {
            $req4 = $bdd->prepare('SELECT type FROM type_piece WHERE id_type_piece = :id_type_piece ');
            $req4->execute(array(
                'id_type_piece' => $piece['id_type_piece']));
            $type_piece = $req4->fetch();
            ?>
            <div id="conteneur_titre_pièce">
                <div id="titre_piece">
                    <?php echo  $type_piece['type'] .' '. $piece['numero'];?>
                </div>
                <div id="conteneur_suprimer">
                    <form  method="post" action="index.php?cible=gerermamaison&fonction=supprimer_piece&idpiece=<?php echo $piece['id_piece'] ?>">
                        <button id="bouton_suprimer" type="submit" >
                        <img id="picto_supprimer" src="image/icone_poubelle.png" title="suprimer" />
                        </button>
                    </form>
                </div>

            </div>

            <?php
            $req2 = $bdd->prepare('SELECT id_cemac,numero FROM cemac WHERE ID_piece =:id_piece ');
            $req2->execute(array(
                'id_piece' => $piece['id_piece']));
            while ($idcemac = $req2->fetch())
                {
                    ?>
                    <div id="conteneur_titre_cemac">
                        <div id="titre_cemac">
                            <?php echo 'Cemac '. $idcemac['numero']; ?>
                        </div>
                        <div id="conteneur_suprimer">
                            <form  method="post" action="index.php?cible=gerermamaison&fonction=supprimer_cemac&id_cemac=<?php echo $idcemac['id_cemac'] ?>">
                                <button id="bouton_suprimer" type="submit" >
                                    <img id="picto_supprimer" src="image/icone_poubelle.png" title="suprimer" />
                                </button>
                            </form>
                        </div>
                    </div>

                    <?php

                    $req3 = $bdd->prepare('SELECT id_type, num_serie,etat FROM capteur WHERE id_cemac =:id_cemac ');
                    $req3->execute(array(
                        'id_cemac' => $idcemac['id_cemac']));
                    while ($nom_capteur = $req3->fetch())
                    {
                        $req5 = $bdd->prepare('SELECT nom_type FROM type_capteur WHERE id_type_capteur =:id_type_capteur ');
                        $req5->execute(array(
                            'id_type_capteur' => $nom_capteur['id_type']));
                        $titre_capteur = $req5->fetch();

                        ?>
                        <div id="conteneur_titre_capteur">

                                <div id="conteneur_etat">
                                <?php if($nom_capteur['etat']==1)
                                {
                                    ?>
                                    <img id="picto_etat" src="image/button-green.png" title="bon état" />
                                    <?php
                                }
                                else{
                                    ?>
                                    <img id="picto_etat" src="image/button-red.png" title="mauvais état" />
                                    <?php
                                }
                                ?>
                                </div>
                            <div id="titre_capteur">
                                <?php echo 'Capteur '. $titre_capteur['nom_type']; ?>
                            </div>
                            <div id="conteneur_suprimer">
                                <form  method="post" action="index.php?cible=gerermamaison&fonction=supprimer_capteur&id_capteur=<?php echo $nom_capteur['num_serie'] ?>">
                                    <button id="bouton_suprimer" type="submit" >
                                        <img id="picto_supprimer" src="image/icone_poubelle.png" title="suprimer" />
                                    </button>
                                </form>
                            </div>
                        </div>

                        <?php
                    }

                }

        }
        ?>
        </div>
        </div>


<?php
include("footer.php");

?>
<script type="text/javascript" src="http://localhost/APP/js/monjs.js"></script>
    </body>
    </html>
