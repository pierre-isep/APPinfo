<?php
/**
 * Vue : entête HTML
 */
?>



<div id="conteneurentete">
    <div id="logoentete">
        <img id="imglogo"src="http://localhost/APP/image/logo-bls.png" id="logo">
    </div>
    <div id="hearthomeentete">
        <div id="hometech"><titrelogo>Hometech</titrelogo></div>
        <div id="domisependessous">Domisep</div>
    </div>
    <div id="menuglobal">
        <ul id="menu">
            <li id="menu-header-tableaudebord"><form  method="post" action="index.php?cible=tableau_de_bord_admin&fonction=accueil"><a><button id="bouton_sans_style" type="submit" >Tableau de bord</button></a></form>
            </li>
            <li id="menu-header-gerermamaison"><form  method="post" action="index.php?cible=cgu_admin_controleur&fonction=admin"><a><button id="bouton_sans_style" type="submit" >CGU</button></a></form>
            </li>
            <li id="menu-header-gerermamaison"><form  method="post" action="index.php?cible=tableau_de_bord_admin&fonction=catalogue"><a><button id="bouton_sans_style" type="submit" >Catalogue</button></a></form>
            </li>
        </ul>


    </div>


    <div id="utilisateur">
        <utilisateur><?php echo ''. $_SESSION['Prenom'].' '. $_SESSION['Nom']  ; ?></utilisateur>
        <div id="utilisateur-fleche"><img id="fleche"src="http://localhost/APP/image/Fleche.png" id="logo"></div>
        <div id="conteneur-menu-utilisateur">
            <ul id="menu-utilisateur">
                <li><form  method="post" action="index.php?cible=menu_utilisateur&fonction=deconexion"><a><button id="bouton_sans_style" type="submit" >Déconnexion</button></a></form></li>
            </ul>


        </div>
    </div>
</div>