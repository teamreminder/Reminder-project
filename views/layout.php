<!doctype html>
<html class="no-js" lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Reminder</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="block clearfix">
      <header>
        <div class="box">
          <nav>
            <a href="?controller=rappels&action=admin">back office</a>
            <a href="deconnection.php" title="se_deconnecter">deconnection</a>
          </nav>
        </div>
      </header>
      <section>
        <ul>
           <?php
            require_once('routes.php');
          ?>
        </ul>
      </section>
    </div>
  </body>
</html>
