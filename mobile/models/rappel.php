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

    $requete = "SELECT user.id_user, id_rappel, email, rappel.id_user as id_destinataire
                FROM rappel INNER JOIN user ON user.id_user = rappel.id_user_etre_destinataire
                WHERE rappel.id_user = '$cookie'
                AND email='$email2'";
    $result=$db->query($requete);
    foreach ($result as $value)
    {
      $email=$value['email'];
      $id_user_destinataire=$value['id_user'];
    }
      if (isset($email)) {
        $id_user_destinataire=$value['id_user'];
        $req2="INSERT INTO rappel (objet, date_rappel, message, date_enregistrement, id_user, id_user_etre_destinataire) VALUES ('$objet', '$gooddate', '$message', '$today', '$cookie', '$id_user_destinataire')";
        $result=$db->query($req2);
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
        $req = "INSERT INTO  user(email,password) VALUES ('$email2','$pwd')";
        $db->query($req);
        $requete = "SELECT email, id_user
                    FROM user
                    WHERE email='$email2'";
        $result=$db->query($requete);
        foreach ($result as $value)
        {
          $id_user_destinataire=$value['id_user'];
          $requete2="INSERT INTO rappel (id_rappel, objet, date_rappel, message, date_enregistrement, id_user, id_user_etre_destinataire) VALUES (NULL, '$objet', '$gooddate', '$message', '$today', '$cookie', '$id_user_destinataire')";
          $result=$db->query($requete2);
        }
      }

      $requete3 = "SELECT email, id_user
                   FROM user
                   WHERE id_user='$cookie'";
      $result=$db->query($requete3);
      foreach ($result as $value)
      {
        $expediteur=$value['email'];
      }
      $requete4 = "SELECT email
                   FROM user
                   WHERE id_user='$cookie'";
      $result=$db->query($requete4);
      foreach ($result as $value)
      {
        $expediteur=$value['email'];
      }
      $objet2="Autorisation Reminder";
      $header="MIME-Version: 1.0\r\n";
      $header.='From:"Charlesdelpech1@gmail.com"<Charlesdelpech1@gmail.com>'."\n";
      $header.='Content-Type:text/html; charset="uft-8"'."\n";
      $header.='Content-Transfer-Encoding: 8bit';

      $message2="
      <html>
        <body>
          <div align='center'>
            <h1>Reminder</h1>
          </div>
          <p>Bonjour Mme/M.<br><br>Notre utilisateur $expediteur souhaite vous envoyez un mail de rappel grâce à notre application Reminder<br><br>Pour accepter cette invitation, inscrivez-vous! Cela ne prendra qu'un instant</p>
          <br><br><a href='http://remind-me.fr/index.php?controller=rappels&action=registerByMail&id=$id_user_destinataire'>S'inscrire</a>
        </body>
      </html>
      ";

      mail($email2,$objet2,$message2,$header);
  }
 
  public static function home() {
    $list = [];
    $db=Db::getInstance();
    $cookie=$_COOKIE['utilisateur'];
    $req = $db->query("SELECT id_rappel, date_rappel, objet, slots, message, email, rappel.id_user as id_destinataire
                       FROM rappel INNER JOIN user ON user.id_user = rappel.id_user_etre_destinataire
                       WHERE rappel.id_user = $cookie
                       ORDER BY date_rappel");
    foreach($req->fetchAll() as $post) {
      $list[] = new Rappel($post['id_rappel'], $post['date_rappel'], $post['objet'], $post['email'], $post['id_destinataire'], $post['slots'], $post['message']);
    }
    return $list;
  }

  public static function slots() {
    $db=Db::getInstance();
    $cookie=$_COOKIE['utilisateur'];
    $list = [];
    $req = $db->query("SELECT count(id_rappel) AS nb_rappel, slots, id_rappel, objet, email, id_user_etre_destinataire, date_rappel
    FROM rappel INNER JOIN user ON user.id_user = rappel.id_user_etre_destinataire
    WHERE rappel.id_user=$cookie");
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
    $today=date('Y-m-d H:i:s');
    $date=substr($datetime, 0, -6);
    $time=substr($datetime, 11, 5);
    $gooddate=$date." ".$time.":00";
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
      $req = "INSERT INTO  user(email,password) VALUES ('$email2','$pwd')";
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

}
?>
