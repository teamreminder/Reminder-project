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
      <div class="gestion_group">
        <div class="container">
          <div class="row">
            <div class="col align-self-start">
              <h3>Gestion des contacts</h3>
            </div>
            <div class="col align-self-end">
              <a href="#"><img src="img/add_button.png" alt=""></a>
            </div>
          </div>
        </div>
          <table class="gestion_group">
            <tr>
              <th>Libellé</th>
              <th>Nombre de membres</th>
            </tr>
              <?php
              for ($i = 1; $i <= 5; $i++) {
                  ?>
                        <tr>
                          <td>Dixneuf</td>
                          <td>Florent</td>
                          <td>Isfac</td>
                          <td><a href='#'><img src="img/pens.png"=""></a></td>
                          <td><a href='#'><img src="img/cross.png"=""></a></td>
                        </tr>
                  <?php
                  }
              ?>
          </table>
          <div class="container">
            <div class="bouton_accueil">
              <a href="accueil.php">retour accueil</a>
            </div>
          </div>
        </div>
    </section>
    <footer>
      <a href="#">Politique de confidentialité</a>
    </footer>

  </body>
</html>
