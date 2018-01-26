
    <!DOCTYPE html>
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/gestion_utilisateurs.css">
    <link rel="script" href="OHcabouge.js">
    <title>Domisep</title>
</head>
<body>
        <?php include 'modele/connexion.php';
         include("header.php");?>


                    <div id="section2">
                                <h1> Informations utilisateurs : </h1>
                            <?php
                            $requete =  $bdd->query('SELECT ID_personne FROM compte');
                            $reponse = $bdd->query('SELECT ID_personne, Nom_personne, Prenom, ID_typeCompte FROM compte');


                            echo '<table>
                               
                               <thead> 
                                   <tr>
                                       <th>NOM</th>
                                       <th>PRÉNOM</th>
                                       <th>TYPE DE COMPTE</th>
                                       
                                   </tr>
                                <tfoot> 
                                   <tr>
                                       <th colspan="3"><form  method="post" action="index.php?cible=menu_utilisateur&fonction=ajout_utilisateur"><button id="bouton_sans_style2" type="submit" >Ajouter un utilisateur</button></form></th>
                                   </tr>
                               </tfoot>';
                            while ($donnees = $reponse->fetch())
                            {

                                echo '<tr>
                                        <td>'.htmlspecialchars($donnees['Nom_personne']).'</td>
                                        <td>'.htmlspecialchars($donnees['Prenom']).'</td>
                                        <td>'.htmlspecialchars($donnees['ID_typeCompte']).'</td>
                                        
                                    </tr>';
                            }

                            echo '</table>';

                            ?>

                            <?php $reponse->closeCursor(); ?>
                    </div>


        <?php
        include("footer.php");
        ?>

    </body>

</html>