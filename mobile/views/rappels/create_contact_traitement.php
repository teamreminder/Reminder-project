<?php
if (isset($_COOKIE['utilisateur'])) {
$email=$_GET['email'];
$prenom=$_GET['prenom'];
$nom=$_GET['nom'];

?>
<div class="container">
  <div class="traitement">
    <a href='?controller=rappels&action=gestionContact'>retour à la liste des contacts</a>
  </div>
</div>
<?php
}else{
  ?>
  <div class="container">
    <p>session expirée ! veuillez vous reconnecter !</p>
    <a href="?controller=rappels&action=index">retour connection</a>
  </div>
  <?php
}
 ?>
