<?php

$email=$_POST['email'];
$password= hash('sha512', $_POST['password']);
$telephone=$_POST['telephone'];
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];

if( isset($_POST['email']) && !empty($_POST['email']) && (strlen($_POST['email']) <= 300) &&
isset($_POST['password']) && !empty($_POST['password']) && (strlen($_POST['password']) <= 300) &&
isset($_POST['telephone']) && !empty($_POST['telephone']) && (strlen($_POST['telephone']) ==10) && is_int($_POST['telephone']) &&
isset($_POST['prenom']) && !empty($_POST['prenom']) && (strlen($_POST['prenom']) <=50) &&
isset($_POST['nom']) && !empty($_POST['nom']) && (strlen($_POST['nom']) <=50)) {

  echo "Votre inscription a été faite.";

}else{
  echo "Erreur dans le remplissage du formulaire.";
}
 ?>
<a href='index.php'>retour page se connecter</a>
 
