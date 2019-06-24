<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Reminder</title>
    <link rel="icon" href="favicon.ico" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header>
      <!-- <a href="?controller=rappels&action=admin">back office</a>
      <a href="deconnection.php" title="se_deconnecter">deconnection</a> -->
      <div class="row">
        <div class="col align-self-start">
          <a href="index.php"><img src="img/logo_reminder.png" alt="logo"></a>
          <a href="index.php"><h1>REMINDER</h1></a>
        </div>
      </div>
      <?php
        if (isset($_COOKIE['utilisateur'])) {
      ?>
      <div class="col align-self-end">
        <div class="dropdown">
          <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="img/menu-button.png" width="40px" height="40px" alt="logo">
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <button class="dropdown-item" type="button"><img src="img/phone-book.png" alt="logo"><a href="?controller=rappels&action=gestionContact">  Gestion des contacts</a></button>
              <button class="dropdown-item" type="button"><img src="img/team.png" alt="logo"><a href="?controller=rappels&action=gestionGroup">  Gestion des groupes</a></button>
              <hr>
              <button class="dropdown-item" type="button"><img src="img/user.png" alt="logo"><a href="?controller=rappels&action=monCompte">  Mon compte</a></button>
              <hr>
              <button class="dropdown-item" type="button"><a href="?controller=rappels&action=index"><img src="img/close.png" alt="logo">  Se déconnecter</a></button>
            </div>
          </div>
        </div>
      </div>
      <?php
      }
      ?>  
    </header>
    <section>
<?php
  require_once('routes.php');
?>
    </section>
    <footer>
      <a href="#"> Politique de confidentialité </a>
    </footer>
  </body>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
