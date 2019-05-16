<?php
  if (isset($_COOKIE['utilisateur'])) {


 ?>
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
