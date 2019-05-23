<?php
  if (isset($_COOKIE['utilisateur'])) {
    $id=$_GET['id'];
 ?>
<div class="container">
  <h4>Modifier contact</h4>
  <?php
  foreach ($posts as $post) { 
    ?>
  <form action="index.php" method="GET">
    <input type="hidden" name="controller" value="rappels">
    <input type="hidden" name="action" value="UpdateContactTraitement">

    <div class="form-group">
      <label for="InputPrenom">Prénom</label>
      <input type="text" value="<?php echo $post->id_user; ?>" class="form-control" name="prenom" id="exampleInputPrenom1" placeholder="Votre prénom...">
    </div>
    <div class="form-group">
      <label for="InputNom">Nom</label>
      <input type="text" value="<?php echo $post->nom; ?>" class="form-control" name="nom" id="exampleInputNom1" placeholder="Votre nom...">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email *</label>
      <input type="email" value="<?php echo $post->idUserLiaison; ?>" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre email...">
    </div>

    <div class="row">
      <div class="col align-self-end">
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
      </div>
    </div>
  </form>
  <?php
  }
  ?>
  <div class="bouton_accueil">
    <a href="?controller=rappels&action=gestionContact">Retour</a>
  </div>
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
