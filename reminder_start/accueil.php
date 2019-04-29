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
      <div class="container">
        <div class="row">
          <div class="col-8">
            <a href="gestion_contact.php">Gestion contact</a><br>
            <a href="gestion_groupe.php">Gestion groupe</a>
          </div>
          <div class="col-4 align-self-end">
            <a href="create_remind.php"><img src="img/add_button.png" width="80px" height="80px"alt=""></a>
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
                    <p>Florent Dixneuf<br>
                    Rappel stage - (21/05/19)</p>
                  </div>
                  <div class="col-4 align-self-end">
                    <a href='edit_remind.php'><img src="img/pens.png"=""></a>
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
      <div class="ad">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
          (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-9197870261646752",
            enable_page_level_ads: true
          });
        </script>
      </div>
    </section>

    <footer>
      <a href="#">Politique de confidentialité</a>
    </footer>
  </body>
</html>
