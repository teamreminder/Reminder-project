<div class="password_forget">
  <div class="container">
    <h3>Mot de passe oublié</h3>
    <form action="index.php" method="get">
      <input type="hidden" name="controller" value="rappels">
      <input type="hidden" name="action" value="passwordForgetTraitement">
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre email...">
      </div>
      <div class="row">
        <div class="col align-self-end">
          <button type="submit" class="btn btn-primary">SE CONNECTER</button>
        </div>
      </div>
    </form>
  </div>
</div>
