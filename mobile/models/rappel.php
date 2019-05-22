<?php
class Rappel {
  public $id_rappel;
  public $date_rappel;
  public $objet;
  public $email;
  public $id_user;


  public function __construct($id_rappel, $date_rappel, $objet, $email, $id_user) {
    $this->id_rappel = $id_rappel;
    $this->date_rappel = $date_rappel;
    $this->objet = $objet;
    $this->email = $email;
    $this->id_user = $id_user;
    }

  public static function createReminderTraitement() {
    $db=Db::getInstance();
    $email=$_GET['destinataire'];
    $datetime=$_GET['datetime'];
    $objet=$_GET['objet'];
    $message=$_GET['message'];
    $cookie=$_COOKIE['utilisateur'];
    $today=date("Y-m-d H:i:s");
    $id_destinataire="";

    $requete1="SELECT id_user,email FROM user WHERE email='$email'";
    $reponse=$db->query($requete1);

    foreach ($reponse as $info)
    {
     $id_destinataire = $info['id_user'];
     echo $info;
    }

    $req2="INSERT INTO rappel (objet, date_rappel, message, date_enregistrement, id_user, id_user_etre_destinataire)
    VALUES ( $objet, $datetime, $message, $today, $cookie, $id_destinataire)";
    $db->query($req2);
  }

  public static function home() {
    $list = [];
    $db=Db::getInstance();
    $cookie=$_COOKIE['utilisateur'];
    $req = $db->query("SELECT id_rappel, date_rappel, objet, email, rappel.id_user as id_destinataire
                       FROM rappel INNER JOIN user ON user.id_user = rappel.id_user_etre_destinataire
                       WHERE rappel.id_user = $cookie");
    foreach($req->fetchAll() as $post) {
      $list[] = new Rappel($post['id_rappel'], $post['date_rappel'], $post['objet'], $post['email'], $post['id_destinataire']);
    }
    return $list;
  }

}
?>
