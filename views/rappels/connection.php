<?php

if ((isset($_GET['email']) && !empty($_GET['email']) && (strlen($_GET['email']) <= 300))&&(isset($_GET['password']) && !empty($_GET['password']) && (strlen($_GET['password']) <= 300)))
 {
   header("location: ?controller=rappels&action=home");

 }else {
   echo "formulaire mal rempli !";
   echo "<br><a href='index.php'>retour page de connection</a>";
 }

?>
