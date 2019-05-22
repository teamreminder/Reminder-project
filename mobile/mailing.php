<?php

$bdd = new PDO('mysql:host=remindmeuiremind.mysql.db;dbname=remindmeuiremind;charset=utf8', 'remindmeuiremind', 'Isfac2019', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// $bdd = new PDO('mysql:host=localhost;dbname=reminder', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$requete = "SELECT date_rappel
            FROM rappel";
$result=$bdd->query($requete);
$resultat=$result->fetchAll();
foreach ($resultat as $value)
{
  $date_rappel=$value['date_rappel'];

// $req = $db->query("SELECT *
//                    FROM rappel");
// foreach($req->fetchAll() as $post) {
//   $list[] = new Rappel($post['date_rappel']);
// }
//
// foreach ($posts as $post) {
  //
  // $date_rappel= $post->date_rappel;

  echo date('Y-m-d H')."<br>";
  echo substr($date_rappel, 0, -6)."<br>";

  if (date('Y-m-d H')==substr($date_rappel, 0, -6)) {
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"Charlesdelpech1@gmail.com"<Charlesdelpech1@gmail.com>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';

    $message='
    <html>
      <body>
        <div align="center">
          <p>Envoi de mail</p>
          <br>

        </div>
      </body>
    </html>
    ';

    mail("charlesdelpech1@gmail.com","test",$message,$header);
  }
}
 ?>
