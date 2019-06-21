<div class="password_forget">
  <div class="container">
    <h3>Mot de passe oublié</h3>
    <form action="index.php" method="get">
      <input type="hidden" name="controller" value="rappels">
      <input type="hidden" name="action" value="passwordForgetTraitement">
      <p>Nous allons vous créer un nouveau mot de passe et vous l'envoyez sur votre adresse mail.</p>
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre email...">
      </div>
      <div class="row">
        <div class="col align-self-end">
          <button type="submit" class="btn btn-primary">ENVOYER</button>
        </div>
      </div>
    </form>
    <a href="?controller=rappels&action=index">Retour</a>
  </div>
</div>
