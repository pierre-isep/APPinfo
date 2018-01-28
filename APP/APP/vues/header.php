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
                <li id="menu-header-tableaudebord"><form  method="post" action="index.php?cible=tableau_de_bord_utilisateur&fonction=accueil"><a><button id="bouton_sans_style" type="submit" >Tableau de bord</button></a></form>
                </li>
                <li id="menu-header-gerermamaison"><form  method="post" action="index.php?cible=gerermamaison&fonction=gerermamaison"><a><button id="bouton_sans_style" type="submit" >Gérer ma maison</button></a></form>
   <!--                 <div id="conteneur-sousmenu-header-gerermamaison">
                        <ul id="sousmenu-header-gerermamaison">
                            <li><a href="#">Pièce1</a></li>
                            <li><a href="#">Pièce2</a></li>
                            <li><a href="#">Pièce3</a></li>
                            <li><a href="#">Pièce4</a></li>
                        </ul>
                    </div>  -->
                </li>
                <li id="menu-header-tableaudebord"><form  method="post" action="index.php?cible=tableau_de_bord_utilisateur&fonction=faq"><a><button id="bouton_sans_style" type="submit" >FAQ</button></a></form>
                </li>

            </ul>


        </div>


        <div id="utilisateur">
            <utilisateur><?php echo ''. $_SESSION['Prenom'].' '. $_SESSION['Nom']  ; ?></utilisateur>
            <div id="utilisateur-fleche"><img id="fleche"src="http://localhost/APP/image/Fleche.png" id="logo"></div>
            <div id="conteneur-menu-utilisateur">
                <ul id="menu-utilisateur">
                    <li><form  method="post" action="index.php?cible=menu_utilisateur&fonction=profil"><a><button id="bouton_sans_style" type="submit" >Profil</button></a></form></li>
                    <li><form  method="post" action="index.php?cible=menu_utilisateur&fonction=gestion_utilisateur"><a><button id="bouton_sans_style" type="submit" >Gérer ma famille</button></a></form></li>
                    <li><form  method="post" action="index.php?cible=menu_utilisateur&fonction=deconexion"><a><button id="bouton_sans_style" type="submit" >Déconexion</button></a></form></li>
                </ul>


            </div>
        </div>
    </div>