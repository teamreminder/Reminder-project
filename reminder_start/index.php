<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reminder</title>
    <link rel="icon" href="favicon.ico" />
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <header>
      <a href="index.php"><img src="img/logo_reminder.png" alt="logo"></a>
      <a href="index.php"><h1>REMINDER</h1></a>
    </header>

    <section>
      <div class="container">
        <h2>SE CONNECTER</h2>
        <div class="inscription">
          <a href="inscription.php">S'inscrire</a>
        </div>
        <div class="connexion">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Login *</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre login...">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password *</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Votre password...">
            </div>
            <div class="row">
              <div class="col align-self-end">
                <a href="accueil.php">VALIDER</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

    <footer>
      <a href="#">Politique de confidentialité</a>
    </footer>

  </body>
</html>
