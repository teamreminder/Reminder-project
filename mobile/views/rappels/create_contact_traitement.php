<?php
if (isset($_COOKIE['utilisateur'])) {
$email=$_GET['email'];
$prenom=$_GET['prenom'];
$nom=$_GET['nom'];

?>
<div class="container">
  <div class="traitement">
    <?php

    if( isset($_GET['email']) && !empty($_GET['email']) && (strlen($_GET['email']) <= 300) &&
        isset($_GET['prenom']) && !empty($_GET['prenom']) && (strlen($_GET['prenom']) <=50) &&
        isset($_GET['nom']) && !empty($_GET['nom']) && (strlen($_GET['nom']) <=50)) {
          ?>
            <p>Le contact a bien été créé.</p>
          <?php
        }else{
          ?>
            <p>Erreur dans le remplissage du formulaire.</p>
          <?php
        }
        ?>
    <a href='?controller=rappels&action=home'>retour à l'accueil</a>
  </div>
</div>
<?php
}else{
  ?>
  <div class="container">
    <p>session expirée ! veuillez vous reconnecter !</p>
    <a href=?controller=rappels&action=index>retour connection</a>
  </div>
  <?php
}
 ?>
