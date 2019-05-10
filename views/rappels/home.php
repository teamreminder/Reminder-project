<div class="container">
  <div class="row">
    <div class="col-8">
      <a href="?controller=rappels&action=gestionContact">Gestion contact</a><br>
      <a href="?controller=rappels&action=gestionGroup">Gestion groupe</a>
    </div>
    <div class="col-4 align-self-end">
      <a href="?controller=rappels&action=createReminder"><img src="img/add_button.png" width="80px" height="80px"alt=""></a>
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
         <p><?php echo $post->destinataire; ?><br>
          <?php echo "Objet : ".$post->objet."<br>";
          echo substr($post->date_rappel, 0, -9);
           ?></p>
       </div>
       <div class="col-4 align-self-end">
         <a href='edit_remind.php'><img src="img/pens.png"=""></a>
         <a href='#'><img src="img/cross.png"=""></a>
       </div>
     </div>
     <hr>
     <?php
    }
    ?>
   </div>
 </div>
<div class="ad">
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({
      google_ad_client: "ca-pub-9197870261646752",
      enable_page_level_ads: true
    });
  </script>
</div>
