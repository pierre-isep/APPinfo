<?php
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/accueil_utilisateur.css">
    <link rel="script" href="OHcabouge.js">
    <title>Hometech</title>
</head>
<body>
<?php include("header.php");?>

<div id="section">

    <div id="conteneur_gauche">



            <form  method="post" id="conteneur_bouton_haut" action="index.php?cible=tableau_de_bord_utilisateur&fonction=gerer_ma_maison">

                <button id="bouton_gestion" type="submit" >
                    <div id="picto">
                        <img id="picto_capteur" src="image/picto_capteur.png" title="page_gestion_capteur" />
                    </div>

                    <div id="texte">
                        Gestion des capteurs
                    </div>

                </button>

            </form>




        <form  method="post" id="conteneur_bouton_bas" action="index.php?cible=tableau_de_bord_utilisateur&fonction=gerer_ma_maison">

            <button id="bouton_gestion" type="submit" >
                <div id="picto">
                    <img id="picto_maison" src="image/picto_maison.png" title="page_gestion_maison" />
                </div>

                <div id="texte">
                    Gestion de ma maison
                </div>

            </button>

        </form>

    </div>

    <div id="conteneur_droit">

        <div id="titre_fonctionnalite">

            <div id="picto">
                <img id="picto_fonctionalite" src="image/picto_fonctionalite.png" title="choix fonctionalite" />
            </div>

            <div id="texte_titre_fonctionalite">
                Fonctionnalité
            </div>

        </div>

        <form  method="post" id="conteneur_bouton_fonctionalite" action="index.php?cible=fonctionnalite&fonction=fonction_temp">

            <button id="bouton_fonctionalite" type="submit" >
                <div id="texte_fonctionalite">
                    Température
                </div>
            </button>

        </form>

        <form  method="post" id="conteneur_bouton_fonctionalite" action="index.php?cible=fonctionnalite&fonction=fonction_lumiere">

            <button id="bouton_fonctionalite" type="submit" >
                <div id="texte_fonctionalite">
                    Lumière
                </div>
            </button>

        </form>

        <form  method="post" id="conteneur_bouton_fonctionalite" action="index.php?cible=fonctionnalite&fonction=fonction_hygro">

            <button id="bouton_fonctionalite" type="submit" >
                <div id="texte_fonctionalite">
                    Hygrométrie
                </div>
            </button>

        </form>

    </div>


</div>


<?php
include("footer.php");
?>

</body>
</html>



