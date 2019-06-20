<?php
  if (isset($_COOKIE['utilisateur'])) {
 ?>
<div class="container">
  <h2>Nouveau contact</h2>
  <div class="inscription">
    <a href="?controller=rappels&action=gestionContact">retour gestion des contacts</a>
  </div> 
  <div class="connexion">
    <form action="index.php" method="GET">
      <input type="hidden" name="controller" value="rappels">
      <input type="hidden" name="action" value="CreateContactTraitement">
      <div class="form-group">
        <div class="form-group">
          <label for="InputPrenom">Prénom</label>
          <input type="text" class="form-control" name="prenom" id="exampleInputPrenom1" placeholder="Votre prénom...">
        </div>
        <div class="form-group">
          <label for="InputNom">Nom</label>
          <input type="text" class="form-control" name="nom" id="exampleInputNom1" placeholder="Votre nom...">
        </div>
        <label for="exampleInputEmail1">Email *</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre email...">
      </div>
      <div class="row">
        <div class="col align-self-end">
          <button type="submit" class="btn btn-primary">CRÉER</button>
        </div>
      </div>
    </form>
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
