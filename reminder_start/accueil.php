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
        <div class="row">
          <div class="col align-self-end">
            <a href="#"><img src="img/add_button.png" alt=""></a>
          </div>
        </div>
      </div>


        <?php

        for ($i = 1; $i <= 5; $i++) {
            ?>
            <div class="container">
              <div class="list_reminder">
                <div class="row">
                  <div class="col-8">
                    <p>Florent Dixneuf</p>
                    <p>Rappel stage - (21/05/19)</p>
                  </div>
                  <div class="col-4 align-self-end">
                    <a href='#'><img src="img/pens.png"=""></a>
                    <a href='#'><img src="img/cross.png"=""></a>
                  </div>
                </div>
                <hr>
              </div>
            </div>
            <?php
            }
        ?>

      </div>
    </section>

    <footer>
      <a href="#">Politique de confidentialité</a>
    </footer>

  </body>
</html>
