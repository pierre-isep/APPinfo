<?php
/**
 * Vue : entête HTML
 */
?>



<div id="conteneurentete">
    <div id="logoentete">
        <img id="imglogo"src="http://localhost/APP/image/logo-bls.png" id="logo">
    </div>
    <div id="Kumhomeentete">
        <titrelogo>Heart'Home</titrelogo>
    </div>
    <div id="menuglobal">
        <ul id="menu">
            <li id="menu-header-tableaudebord"><form  method="post" action="index.php?cible=cgu_admin_controleur"><a><button id="bouton_sans_style" type="submit" >Tableau de bord</button></a></form>
            </li>
            <li id="menu-global-connexion"><a href="#">Statistiques</a>
            </li>
            <li id="menu-header-gerermamaison"><form  method="post" action="index.php?cible=cgu_admin_controleur"><a><button id="bouton_sans_style" type="submit" >CGU</button></a></form>
            </li>
            <li id="menu-global-connexion"><a href="#">FAQ</a>
            </li>
            <li id="menu-global-contact"><a href="#">Contact</a>
            </li>
        </ul>


    </div>


    <div id="utilisateur">
        <utilisateur><?php echo ''. $_SESSION['Prenom'].' '. $_SESSION['Nom']  ; ?></utilisateur>
        <div id="utilisateur-fleche"><img id="fleche"src="http://localhost/APP/image/Fleche.png" id="logo"></div>
        <div id="conteneur-menu-utilisateur">
            <ul id="menu-utilisateur">
                <li><form  method="post" action="index.php?cible=menu_utilisateur&fonction=deconexion"><a><button id="bouton_sans_style" type="submit" >Déconexion</button></a></form></li>
            </ul>


        </div>
    </div>
</div>