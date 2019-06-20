<?php

if (isset($_COOKIE['utilisateur'])) {

?>
<div class="container">
  <div class="titre">
    <h2>SE CONNECTER</h2>
  </div>
  <div class="connexion">
    <form action="index.php" method="get">
      <input type="hidden" name="controller" value="admin">
      <input type="hidden" name="action" value="authentification_by_mail">
      <div class="form-group">
        <label for="exampleInputEmail1">Email *</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre email...">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password *</label>
        <input type="password" class="form-control"  name="password" id="exampleInputPassword1" placeholder="Votre password...">
      </div> 
      <div class="row">
        <div class="col align-self-end">
          <button type="submit" class="btn btn-primary">SE CONNECTER</button>
        </div>
      </div>
    </form>
  </div>
  <a href="?controller=rappels&action=createReminder">Retour</a>
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
