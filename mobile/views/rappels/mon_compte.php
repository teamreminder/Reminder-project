<div class="container">
  <h3>Mon compte</h3>
  <?php
    foreach ($posts as $post) {
  ?>  
  <form action="index.php" method="GET">
    <input type="hidden" name="controller" value="rappels">
    <input type="hidden" name="action" value="monCompteTraitement">
    <div class="form-group">
      <div class="form-group">
        <label for="exampleInputEmail1">Email *</label>
        <input type="email" class="form-control" value="<?php echo $post->id; ?>" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre email..." required>
      </div>
      <div class="form-group">
        <label for="InputNom">Votre nouveau mot de passe</label>
        <input type="text" class="form-control" name="password" id="exampleInputPassword1" placeholder="Votre mot de passe..." required>
      </div>
      <div class="form-group">
        <label for="InputNom">Confirmer nouveau mot de passe</label>
        <input type="text" class="form-control" name="password2" id="exampleInputPassword2" placeholder="Votre mot de passe..." required>
      </div>
      <div class="form-group">
        <label for="InputPrenom">Prénom</label>
        <input type="text" class="form-control" value="<?php echo $post->email; ?>" name="prenom" id="exampleInputPrenom1" placeholder="Votre prénom...">
      </div>
      <div class="form-group">
        <label for="InputNom">Nom</label>
        <input type="text" class="form-control" value="<?php echo $post->password; ?>" name="nom" id="exampleInputNom1" placeholder="Votre nom...">
      </div>
      <div class="row">
        <div class="col align-self-end">
          <button type="submit" class="btn btn-primary">MODIFIER</button>
        </div>
      </div>
    </div>
    <a href="?controller=rappels&action=home">retour accueil</a>
  </div>
  </form>
  <?php
    }
  ?>
</div>
