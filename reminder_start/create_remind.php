<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reminder</title>
    <link rel="icon" href="favicon.ico" />
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
  </head>
  <body>

    <header>
      <a href="accueil.php"><img src="img/logo_reminder.png" alt="logo"></a>
      <a href="accueil.php"><h1>REMINDER</h1></a>
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
                <div class="input-append date form_datetime" data-date="2013-02-21T15:25:00Z">
                  <input size="16" type="text" value="" readonly>
                  <span class="add-on"><i class="icon-remove"></i></span>
                  <span class="add-on"><i class="icon-calendar"></i></span>
              </div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: "dd MM yyyy - hh",
            autoclose: true,
            todayBtn: true,
            startDate: "2013-02-14 10:00",
            minuteStep: 10
        });
    </script>
  </body>
</html>
