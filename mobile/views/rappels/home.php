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
         $anne=substr($post->date_rappel, 0, -15);
         $mois=substr($post->date_rappel, 5, -12);
         $jour=substr($post->date_rappel, 8, -9);
         $heure=substr($post->date_rappel, 11, -6);
         $minutes=substr($post->date_rappel, 14, -3);
         if ($mois==1) {
           $mois="janvier";
         }elseif ($mois==2) {
           $mois="février";
         }elseif ($mois==3) {
           $mois="mars";
         }elseif ($mois==4) {
           $mois="avril";
         }elseif ($mois==5) {
           $mois="mai";
         }elseif ($mois==6) {
           $mois="juin";
         }elseif ($mois==7) {
           $mois="juillet";
         }elseif ($mois==8) {
           $mois="août";
         }elseif ($mois==9) {
           $mois="septembre";
         }elseif ($mois==10) {
           $mois="octobre";
         }elseif ($mois==11) {
           $mois="novembre";
         }elseif ($mois==12) {
           $mois="décembre";
         }
         echo $jour." ".$mois." ".$anne." à ".$heure."h".$minutes;
          ?></p>
      </div>
      <div class="col-4 align-self-end">
        <a href='?controller=rappels&action=updateReminder&id=<?php echo $post->id_rappel ?>'><img src="img/pens.png"=""></a>
        <a href='?controller=rappels&action=deleteRappel&id=<?php echo $post->id_rappel ?>' onclick="return confirm('Etes vous sûre de vouloir supprimer ce contact ?')"><img src="img/cross.png"=""></a>
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
   if (!isset($slots)) {
     for ($i=0; $i<5; $i++) {
       echo "<div class='emplacement'>";
       echo "<p><em>emplacement vide</em></p>";
       echo "<hr>";
       echo "</div>";
     }
   }else {
     for ($i=0; $i <$nb_emplacement_vide; $i++) {
       echo "<div class='emplacement'>";
       echo "<p><em>emplacement vide</em></p>";
       echo "<hr>";
       echo "</div>";
     }
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
