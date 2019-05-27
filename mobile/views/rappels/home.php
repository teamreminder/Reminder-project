<?php
  if (isset($_COOKIE['utilisateur'])) {
 ?>
<div class="container">
 <div class="row">
   <div class="col-8">
     <a href="?controller=rappels&action=gestionContact">Gestion contact</a><br>
     <a href="?controller=rappels&action=gestionGroup">Gestion groupe</a>
   </div>
   <div class="new_reminder">
     <div class="col-4 align-self-end">
       <a href="?controller=rappels&action=createReminder"><img src="img/add_button.png" width="80px" height="80px"alt=""></a>
     </div>
   </div>
 </div>
</div>
<div class="container">
  <div class="list_reminder">
    <?php
      foreach ($posts as $post) {
        ?>
    <div class="row">
      <div class="col-8">
        <p><?php echo $post->email; ?><br>
         <?php echo "Objet : ".$post->objet."<br>";
         echo substr($post->date_rappel, 0, -9);
          ?></p>
      </div>
      <div class="col-4 align-self-end">
        <a href='?controller=rappels&action=updateReminder&id=<?php echo $post->id_rappel ?>'><img src="img/pens.png"=""></a>
        <a href='#'><img src="img/cross.png"=""></a>
      </div>
    </div>
    <hr>
    <?php
   }
   foreach ($value as $post) {
     $slots=$post->message;
     $nb_rappel=$post->nb_rappel;
     $nb_emplacement_vide=$slots-$nb_rappel;
   }
   for ($i=0; $i <$nb_emplacement_vide; $i++) {
     echo "<div class='emplacement'>";
     echo "<p><em>emplacement vide</em></p>";
     echo "<hr>";
     echo "</div>";
   }
   ?>
   </div>
 </div>
<div class="new_slot">
 <a href="#"><img src="img/padlock.png" alt="cadena"><br>Débloquer de nouveaux rappels</a>
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
