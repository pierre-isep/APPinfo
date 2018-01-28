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
            <titrelogo>HomeTech</titrelogo>
        </div>
        <div id="menuglobal">
            <ul id="menu">
                <li id="menu-header-tableaudebord"><form  method="post" action="index.php?cible=tableaudeborduser&fonction=tableau"><a><button id="bouton_sans_style" type="submit" >Tableau de bord</button></a></form>
                </li>
                <li id="menu-global-connexion"><form  method="post" action="index.php?cible=tableaudebordwebmaster&fonction=tableau"><a><button id="bouton_sans_style" type="submit" >Statistiques</button></a></form>
                </li>
                <li id="menu-header-gerermamaison"><form  method="post" action="index.php?cible=gerermamaison&fonction=gerermamaison"><a><button id="bouton_sans_style" type="submit" >Gérer ma maison</button></a></form>
                    <div id="conteneur-sousmenu-header-gerermamaison">
                        <ul id="sousmenu-header-gerermamaison">
                            <li><a href="#">Pièce1</a></li>
                            <li><a href="#">Pièce2</a></li>
                            <li><a href="#">Pièce3</a></li>
                            <li><a href="#">Pièce4</a></li>
                        </ul>
                    </div>
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
                    <li><a href="#">Profil</a></li>
                    <li><a href="#">Gérer les utilisateur secondaires</a></li>
                    <li><a href="vues/Deconnexion.php">déconexion</a></li>
                </ul>


            </div>
        </div>
    </div>