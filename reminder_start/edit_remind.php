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
        <div class="create_remind">
          <h3>Créer un rappel</h3>
          <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputdestinataire">Destinataire</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Votre destinataire...">
                <p>Votre destinataire a refusé le rappel</p> 
              </div>
              <div class="form-group col-md-6">
                <label for="inputobjet">Date de votre rappel</label>
                <input type="datetime-local" class="form-control" id="inputPassword4">
              </div>
              <div class="form-group col-md-6">
                <label for="inputobjet">Objet</label>
                <input type="objet" class="form-control" id="inputPassword4" placeholder="Votre objet...">
              </div>
            </div>
            <div class="form-group">
              <label for="inputcontent">Message</label>
              <textarea name="content" rows="8" cols="50" placeholder="Votre message..."></textarea>
            </div>
            <div class="col align-self-end">
              <button type="submit" class="btn btn-primary">CRÉER</button>
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
