<?php

$email=$_GET['email'];
$password= hash('sha512', $_GET['password']);
$prenom=$_GET['prenom'];
$nom=$_GET['nom'];

if( isset($_GET['email']) && !empty($_GET['email']) && (strlen($_GET['email']) <= 300) &&
isset($_GET['password']) && !empty($_GET['password']) && (strlen($_GET['password']) <= 300)) {

  if (isset($_GET['checkbox'])) {
    ?>
    <div class="container">
      <p>Votre inscription a été faite.</p>
    </div>
    <?php
  }else {
    ?>
    <div class="container">
      <p>Veuillez accepter les mails...</p>
    </div>
    <?php
  }
}else{
  ?>
  <div class="container">
    <p>Erreur dans le remplissage du formulaire.</p>
  </div>
  <?php
}
 ?>
 <div class="container">
   <a href='index.php'>retour page se connecter</a>
 </div>
