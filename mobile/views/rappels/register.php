<div class="container">
  <h2>S'inscrire</h2>
  <div class="inscription">
    <a href="?controller=rappels&action=index">retour accueil</a>
  </div>
  <div class="connexion">
    <form action="index.php" method="GET">
      <input type="hidden" name="controller" value="rappels">
      <input type="hidden" name="action" value="registerTraitement">
      <div class="form-group">
        <div class="form-group">
          <label for="exampleInputEmail1">Email *</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre email...">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mot de passe</label>
          <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Votre mot de passe...">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Confirmer mot de passe</label>
          <input type="password" class="form-control" name="password2" id="exampleInputPassword1" placeholder="Votre mot de passe...">
        </div>
        <div class="form-group">
          <label for="InputPrenom">Prénom</label>
          <input type="text" class="form-control" name="prenom" id="exampleInputPrenom1" placeholder="Votre prénom...">
        </div>
        <div class="form-group">
          <label for="InputNom">Nom</label>
          <input type="text" class="form-control" name="nom" id="exampleInputNom1" placeholder="Votre nom...">
        </div>
          <div class="row">
            <div class="col align-self-end">
              <button type="submit" class="btn btn-primary">S'INSCRIRE</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
