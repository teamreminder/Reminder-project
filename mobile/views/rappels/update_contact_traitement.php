<?php
if( isset($_GET['email']) && !empty($_GET['email']) && (strlen($_GET['email']) <= 300) &&
isset($_GET['prenom']) && !empty($_GET['prenom']) && (strlen($_GET['prenom']) <=50) &&
isset($_GET['nom']) && !empty($_GET['nom']) && (strlen($_GET['nom']) <=50)) {

  echo "Le contact a bien été mis a jour.<br>";

}else{
  echo "Erreur dans le remplissage du formulaire.<br>";
}
 ?>
<a href=?controller=rappels&action=gestionContact>retour gestion des contacts</a>
