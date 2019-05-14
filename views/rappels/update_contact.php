<div class="container">
  <h4>Modifier contact</h4>
  <form action="index.php" method="GET">
    <input type="hidden" name="controller" value="rappels">
    <input type="hidden" name="action" value="CreateContactTraitement">
    <?php
    foreach ($posts as $post) {
      ?>
    <div class="form-group">
      <label for="InputPrenom">Prénom</label>
      <input type="text" value="<?php echo $post->prenom; ?>" class="form-control" name="prenom" id="exampleInputPrenom1" placeholder="Votre prénom...">
    </div>
    <div class="form-group">
      <label for="InputNom">Nom</label>
      <input type="text" value="<?php echo $post->nom; ?>" class="form-control" name="nom" id="exampleInputNom1" placeholder="Votre nom...">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email *</label>
      <input type="email" value="<?php echo $post->email; ?>" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre email...">
    </div>
    <label for="exampleInputEmail1">Lier à un groupe</label>
    <select class="form-control">
      <option><?php echo $post->libelle; ?></option>
    </select>
    <input type="hidden" name="" value="">
    <div class="row">
      <div class="col align-self-end">
        <button type="submit" class="btn btn-primary">CRÉER</button>
      </div>
    </div>
    <?php
    }
    ?>
  </form>
  <div class="bouton_accueil">
    <a href="?controller=rappels&action=gestionContact">Retour</a>
  </div>
</div>
