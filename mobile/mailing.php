<?php

$bdd = new PDO('mysql:host=remindmeuiremind.mysql.db;dbname=remindmeuiremind;charset=utf8', 'remindmeuiremind', 'Isfac2019', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// $bdd = new PDO('mysql:host=localhost;dbname=reminder', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$requete = "SELECT date_rappel, email, objet, message
            FROM rappel";
$result=$bdd->query($requete);
$resultat=$result->fetchAll();
foreach ($resultat as $value)
{
  $date_rappel=$value['date_rappel'];
  $email=$value['email'];
  $objet=$value['objet'];
  $message=$value['message'];

  if (date('Y-m-d H')==substr($date_rappel, 0, -6)) {
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"Charlesdelpech1@gmail.com"<Charlesdelpech1@gmail.com>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';

    $content='
    <html>
      <body>
        <div align="center">
          <h1>Reminder</h1>
        </div>
        '.$message.'
      </body>
    </html>
    ';

    mail($email,$objet,$content,$header);
  }
}
 ?>
