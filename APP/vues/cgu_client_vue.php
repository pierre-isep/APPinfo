<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CGU</title>
  </head>
  <body>

<div class="TEXTE">
  <?php
while($donnees = $reponse->fetch()) {
  echo $donnees['Contenu'];
  echo '<br><br>Dernière modification le ', $donnees['Date_de_derniere_modification'];
}
?>
</div>
  </body>
</html>