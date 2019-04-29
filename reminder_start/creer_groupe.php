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
      <a href="accueil.php"><img src="img/logo_reminder.png" alt="logo"></a>
      <a href="accueil.php"><h1>REMINDER</h1></a>
    </header>

    <section>
      <div class="creer_contact">
        <div class="container">
          <h3>Créer groupe</h3>
          <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputLibelle">Libellé</label>
                <input type="text" class="form-control" id="inputLibelle" placeholder="Libelle">
              </div>
              <div class="form-group col-md-6">
                <label for="inputContact">Contact</label>

                <select id="inputState" class="form-control">
                  <option selected>Contact</option>
                  <option>Florent</option>
                  <option>Charles</option>
                </select>
              </div>
            </div>
            <div class="col align-self-end">
              <button type="submit" class="btn btn-primary">CREER</button>
            </div>
          </form>
        </div>
    </section>
    <footer>
      <a href="#">Politique de confidentialité</a>
    </footer>

  </body>
</html>
