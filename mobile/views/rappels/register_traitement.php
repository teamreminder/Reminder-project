<?php

$email=$_GET['email'];
$password= hash('sha512', $_GET['password']);
$prenom=$_GET['prenom'];
$nom=$_GET['nom'];

if( isset($_GET['email']) && !empty($_GET['email']) && (strlen($_GET['email']) <= 300) &&
isset($_GET['password']) && !empty($_GET['password']) && (strlen($_GET['password']) <= 300) &&
isset($_GET['prenom']) && !empty($_GET['prenom']) && (strlen($_GET['prenom']) <=50) &&
isset($_GET['nom']) && !empty($_GET['nom']) && (strlen($_GET['nom']) <=50)) {

  if (isset($_GET['checkbox'])) {
    echo "Votre inscription a été faite.";
  }else {
    echo "Veuillez accepter les mails...";
  }
}else{
  echo "Erreur dans le remplissage du formulaire.<br>";
}
 ?>
<a href='index.php'>retour page se connecter</a>
