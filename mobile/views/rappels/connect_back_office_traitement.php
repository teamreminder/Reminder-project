<?php
foreach ($posts as $post) {
if ((isset($_GET['email']) && !empty($_GET['email']) && (strlen($_GET['email']) <= 300))&&(isset($_GET['password']) && !empty($_GET['password']) && (strlen($_GET['password']) <= 300)))
 {
   if ($_GET['email']==$post->email && hash('sha512', $_GET['password'])==$post->password && $post->statut=="admin") {
     $id=$post->id;

   setcookie('admin',$id,time()+6000);
   header("location: ?controller=admin&action=homeBackOffice");
   }else{
      echo "erreur d'identification";

 }
 }else {
   echo "formulaire mal rempli !";
   echo "<br><a href='index.php'>retour page de connection</a>";
 }
} 
?>
