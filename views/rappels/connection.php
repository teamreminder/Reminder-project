<?php

if ((isset($_GET['email']) && !empty($_GET['email']) && (strlen($_GET['email']) <= 300))&&(isset($_GET['password']) && !empty($_GET['password']) && (strlen($_GET['password']) <= 300)))
 {
   if ($tableau==true) {
     setcookie('utilisateur',$tableau['id_user'],time()+6000);
     header("location: home.php");

   }else{
     echo "Erreur d'identification";
     echo "<br><a href='index.php'>retour page de connection</a>";
   }
 }else {
   echo "formulaire mal rempli !";
   echo "<br><a href='index.php'>retour page de connection</a>";
 }
}

?>
