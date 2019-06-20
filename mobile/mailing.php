<?php

$bdd = new PDO('mysql:host=remindmeuiremind.mysql.db;dbname=remindmeuiremind;charset=utf8', 'remindmeuiremind', 'Isfac2019', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// $bdd = new PDO('mysql:host=localhost;dbname=reminder', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$requete = "SELECT id_rappel,date_rappel,message, objet, email, rappel.id_user as id_expediteur, blacklist
            FROM rappel INNER JOIN user ON user.id_user = rappel.id_user_etre_destinataire";
$result=$bdd->query($requete);
$resultat=$result->fetchAll();
foreach ($resultat as $value)
{
  $blacklist=$value['blacklist'];
  $date_rappel=$value['date_rappel'];
  $email=$value['email'];
  $objet=$value['objet'];
  $content=$value['message'];
  echo date('Y-m-d H')."<br>";
  echo substr($date_rappel, 0, -6)."<br>";

  if (date('Y-m-d H')==substr($date_rappel, 0, -6)&&($blacklist=="non")) {
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"reminder.application.pro@gmail.com"<reminder.application.pro@gmail.com>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';

    $message='
    <html>
      <body>
        <div align="center">
          <h1>Reminder</h1>
        </div>
        '.$content.'
      </body>
    </html>
    ';

    mail($email,$objet,$message,$header);
  }
}
 ?>
