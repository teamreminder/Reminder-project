<div class="container">
  <h2>SE CONNECTER</h2>
  <div class="inscription">
    <a href="?controller=rappels&action=register">S'inscrire</a>
    <a href="?controller=admin&action=indexAdministrateur">Accès back office</a>
  </div>
  <div class="connexion">
    <form action="index.php" method="get">
      <input type="hidden" name="controller" value="rappels">
      <input type="hidden" name="action" value="connection">
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre email...">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control"  name="password" id="exampleInputPassword1" placeholder="Votre password...">
      </div>
      <div class="row">
        <div class="col align-self-end">
          <a href="?controller=rappels&action=passwordForget">Mot de passe oublié</a>
        </div>
      </div>
      <div class="row">
        <div class="col align-self-end">
          <button type="submit" class="btn btn-primary">SE CONNECTER</button>
        </div>
      </div> 
    </form>
  </div>
</div>
