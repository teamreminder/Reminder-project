<?php
class Rappel {
  public $id_rappel;
  public $date_rappel;
  public $objet;
  public $email;
  public $id_user;
  public $message;
  public $nb_rappel;


  public function __construct($id_rappel, $date_rappel, $objet, $email, $id_user, $message, $nb_rappel) {
    $this->id_rappel = $id_rappel;
    $this->date_rappel = $date_rappel;
    $this->objet = $objet;
    $this->email = $email;
    $this->id_user = $id_user;
    $this->message = $message;
    $this->nb_rappel = $nb_rappel;
    }

  public static function createReminderTraitement() {
    $db=Db::getInstance();
    $cookie=$_COOKIE['utilisateur'];
    $email2=$_GET['email'];
    $objet=$_GET['objet'];
    $datetime=$_GET['datetime'];
    $message=$_GET['message'];
    $today=date('Y-m-d H:i:s');
    $date=substr($datetime, 0, -6);
    $time=substr($datetime, 11, 5);
    $gooddate=$date." ".$time.":00";

    ?><div class="container"><h3>Créer un rappel</h3></div><?php

    $requetecount = "SELECT count(id_rappel) AS nbs_rappel
                     FROM rappel
                     WHERE id_user='$cookie'
                     AND date_rappel > '$today'";
    $resultcount=$db->query($requetecount);
    foreach ($resultcount as $value)
    {
      $nbs_rappel=$value['nbs_rappel'];
    }
    $requeteslots = "SELECT slots, email
                     FROM user
                     WHERE id_user='$cookie'";
    $resultslots=$db->query($requeteslots);
    foreach ($resultslots as $value)
    {
      $slots=$value['slots'];
      $expediteur=$value['email'];
    }

    if ($nbs_rappel<$slots) {
      $requete1 = "SELECT id_user, email, blacklist
                   FROM user
                   WHERE email='$email2'";
      $result1=$db->query($requete1);
      foreach ($result1 as $value)
      {
       $email=$value['email'];
       $id_user_destinataire=$value['id_user'];
       $blacklist=$value['blacklist'];
      }
      if (!isset($email)) {
        $chars = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s",
         "t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M",
        "N","O","P","Q","R","S","T","U","V","W","X","Y","Z","0","1","2","3","4","5","6",
        "7","8","9","&","#","@","+","-","*","!","=","$","%",".",",",";");
        $indexMax = count($chars) - 1;
        $pwd = "";
        for($i = 0 ; $i < 10; $i++)
        {
          $pwd .= $chars[rand(0,  $indexMax)];
        }
        $password=hash('sha512',$pwd);
        $requete3 = "INSERT INTO  user(email,password,date_enregistrement) VALUES ('$email2','$password','$today')";
        $db->query($requete3);
      }
        $requete4 = "SELECT email, id_user, blacklist
                     FROM user
                     WHERE email='$email2'";
        $result4=$db->query($requete4);
        foreach ($result4 as $value)
        {
          $blacklist=$value['blacklist'];
          $id_user_destinataire=$value['id_user'];
        }
        if ($blacklist=="pas encore") {
          $requete5="INSERT INTO rappel (id_rappel, objet, date_rappel, message, date_enregistrement, id_user, id_user_etre_destinataire) VALUES (NULL, '$objet', '$gooddate', '$message', '$today', '$cookie', '$id_user_destinataire')";
          $result5=$db->query($requete5);
          $objet2="Autorisation Reminder";
          $header="MIME-Version: 1.0\r\n";
          $header.='From:"reminder.application.pro@gmail.com"<reminder.application.pro@gmail.com>'."\n";
          $header.='Content-Type:text/html; charset="uft-8"'."\n";
          $header.='Content-Transfer-Encoding: 8bit';

          $message2="
          <html>
            <body>
              <div align='center'>
                <h1>Reminder</h1>
              </div>
              <p>Bonjour Mme/M.<br><br>Notre utilisateur $expediteur souhaite vous envoyez un mail de rappel grâce à notre application Reminder<br><br>Pour accepter cette invitation, inscrivez-vous! Cela ne prendra qu'un instant</p>
              <br><br><a href='http://remind-me.fr/index.php?controller=rappels&action=registerByMailTraitement&id=$id_user_destinataire' class='mailbutton'>J'accepte</a>
              <a href='http://remind-me.fr/index.php?controller=rappels&action=refuseByMailTraitement&id=$id_user_destinataire' class='mailbutton'>Je refuse</a>
              <style>
              a .mailbutton {
                 border: 1px solid #DB9000;
                 padding: 5px;
                 border-radius: 3px;
                 color: #DB9000;
                 text-decoration: none;
                 margin: 5px;
                }
              </style>
            </body>
          </html>
          ";

          mail($email2,$objet2,$message2,$header);
          ?>
            <div class="container">
              <div class="createReminderPicto">
                <p><img src="img/warning.png"></p>
              </div>
              <p>Votre correspondant n'étant pas inscrit sur Reminder, nous lui avons envoyer un premier mail lui demandant son autorisation de recevoir des mails via Reminder. Si il refuse, ou ne repond avant la date du rappel, il ne le recevra pas.</p>
            </div>
          <?php
        }elseif ($blacklist=="non") {
          $requete5="INSERT INTO rappel (id_rappel, objet, date_rappel, message, date_enregistrement, id_user, id_user_etre_destinataire) VALUES (NULL, '$objet', '$gooddate', '$message', '$today', '$cookie', '$id_user_destinataire')";
          $result5=$db->query($requete5);
          ?>
            <div class="container">
              <div class="createReminderPicto">
                <p><img src="img/positive-vote.png"></p>
              </div>
              <p>Votre reminder a bien été enregistré.</p>
            </div>
          <?php
        }elseif ($blacklist=="oui") {
          ?>
            <div class="container">
              <div class="createReminderPicto">
                <p><img src="img/sad.png"></p>
              </div>
              <p>Votre correspondant à refusé les mails provenant de Reminder.</p>
            </div>
          <?php
        }

    }else{

      ?>
        <div class="container">
          <div class="createReminderPicto">
            <p><img src="img/credit-card.png"></p>
          </div>
          <p>Veuillez débloquer de nouveaux emplacements...</p>
        </div>
      <?php

    }

  }

  public static function home() {
    $list = [];
    $db=Db::getInstance();
    $cookie=$_COOKIE['utilisateur'];
    $today=date('Y-m-d H:i:s');
    $req = $db->query("SELECT id_rappel, date_rappel, objet, slots, message, email, rappel.id_user as id_destinataire
                       FROM rappel INNER JOIN user ON user.id_user = rappel.id_user_etre_destinataire
                       WHERE rappel.id_user = $cookie
                       AND date_rappel >= '$today'
                       ORDER BY date_rappel");
    foreach($req->fetchAll() as $post) {
      $list[] = new Rappel($post['id_rappel'], $post['date_rappel'], $post['objet'], $post['email'], $post['id_destinataire'], $post['slots'], $post['message']);
    }
    return $list;
  }

  public static function slots() {
    $db=Db::getInstance();
    $cookie=$_COOKIE['utilisateur'];
    $today=date('Y-m-d H:i:s');
    $list = [];
    $req = $db->query("SELECT count(id_rappel) AS nb_rappel, slots, id_rappel, objet, email, id_user_etre_destinataire, date_rappel
    FROM rappel INNER JOIN user ON user.id_user = rappel.id_user_etre_destinataire
    WHERE rappel.id_user=$cookie
    AND date_rappel >= '$today'");
    foreach($req->fetchAll() as $post) {
      $list[] = new Rappel($post['id_rappel'], $post['date_rappel'], $post['objet'], $post['email'], $post['id_user_etre_destinataire'], $post['slots'], $post['nb_rappel']);
    }
    return $list;
  }

  public static function updateReminder() {
    $list = [];
    $db=Db::getInstance();
    $id_rappel=$_GET['id'];
    $req = $db->query("SELECT id_rappel, date_rappel, objet, message, slots, email, rappel.id_user as id_destinataire
                       FROM rappel INNER JOIN user ON user.id_user = rappel.id_user_etre_destinataire
                       WHERE rappel.id_rappel = $id_rappel");
    foreach($req->fetchAll() as $post) {
      $list[] = new Rappel($post['id_rappel'], $post['date_rappel'], $post['objet'], $post['email'], $post['id_destinataire'], $post['message'], $post['slots']);
    }
    return $list;
  }

  public static function updateReminderTraitement() {
    $list = [];
    $db=Db::getInstance();
    $id_rappel=$_GET['id'];
    $email2=$_GET['destinataire'];
    $objet=$_GET['objet'];
    $datetime=$_GET['datetime'];
    $message=$_GET['message'];
    $today = date('Y-m-d H:i:s');
    $verifdate=substr($datetime, 10, -8);
    if ($verifdate=="T") {
      $date1=substr($datetime, 0, -9);
      $date2=substr($datetime, 11, 5);
      $gooddate=$date1." ".$date2.":00";
    }else {
      $date=substr($datetime, 0, -6);
      $time=substr($datetime, 11, 5);
      $gooddate=$date." ".$time.":00";
    }
    $requete = "SELECT id_user, email
                FROM user
                WHERE email='$email2'";
    $result=$db->query($requete);
    foreach ($result as $value)
    {
      $email=$value['email'];
      $id_user=$value['id_user'];
    }
    if (isset($email)) {
      $id_user=$value['id_user'];
      $requete="UPDATE rappel SET objet = '$objet', date_rappel = '$gooddate', message = '$message', date_enregistrement = '$today', id_user_etre_destinataire = '$id_user' WHERE rappel.id_rappel = $id_rappel";
      $result=$db->query($requete);
    }else{
      $chars = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s",
       "t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M",
      "N","O","P","Q","R","S","T","U","V","W","X","Y","Z","0","1","2","3","4","5","6",
      "7","8","9","&","#","@","+","-","*","!","=","$","%",".",",",";");
      $indexMax = count($chars) - 1;
      $pwd = "";
      for($i = 0 ; $i < 10; $i++)
      {
        $pwd .= $chars[rand(0,  $indexMax)];
      }
      $req = "INSERT INTO  user(email,password,date_enregistrement) VALUES ('$email2','$pwd','$today')";
      $db->query($req);
      $requete = "SELECT email, id_user
                  FROM user
                  WHERE email='$email'";
      $result=$db->query($requete);
      foreach ($result as $value)
      {
        $id_user=$value['id_user'];
        $requete2="UPDATE rappel
                  SET objet = '$objet', date_rappel = '$gooddate', message = '$message', date_enregistrement = '$today', id_user_etre_destinataire = '$id_user'
                  WHERE rappel.id_rappel = $id_rappel";
        $result=$db->query($requete2);
      }
    }
  }

  public static function deleteRappel() {
    $db=Db::getInstance();
    $id=$_GET['id'];
    $requete="DELETE  FROM rappel WHERE id_rappel='$id'";
    $db->query($requete);
  }

  public static function blacklist() {
    $db=Db::getInstance();
    if (isset($_GET['filtre'])) {
      $filtre=$_GET['filtre'];
      $st=$db->query("SELECT DISTINCT email, blacklist FROM user WHERE email='$filtre'");
      $tableau = [];
      foreach ($st as $info) {
       $tableau[]=$info['blacklist'];

      }
      if(empty($info['blacklist'])) {
        $a[]="<p style='color: orange'>pas encore souscrit</p>";
        echo json_encode($a);
      }else {

        if ($info['blacklist']=="pas encore") {
          $a[]="<p style='color: orange'>pas encore souscrit</p>";
          echo json_encode($a);
        }else if ($info['blacklist']=="non"){
          $a[]="<p style='color: green'>il a souscrit</p>";
          echo json_encode($a);
        }else {
          $a[]="<p style='color: red'>il a refusé</p>";
          echo json_encode($a);
        }

      }
    }
  }

}
?>
