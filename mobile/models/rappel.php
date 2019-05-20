<?php
class Rappel {
  public $id_user;
  public $objet;
  public $date_rappel;
  public $id_rappel;
  public $id_user_etre_destinataire;
  public $email;


  public function __construct($id_user, $objet, $date_rappel, $id_rappel, $id_user_etre_destinataire, $email) {
    $this->id_user = $id_user;
    $this->objet = $objet;
    $this->date_rappel = $date_rappel;
    $this->id_rappel = $id_rappel;
    $this->id_user_etre_destinataire = $id_user_etre_destinataire;
    $this->email = $email;
    }

  public static function createReminder() {
    $db=Db::getInstance();
    $id=$_COOKIE['utilisateur'];
    $req = $db->query("SELECT id_user, objet, date_rappel, id_rappel, id_user_etre_destinataire FROM `rappel` WHERE id_user=$id");
      foreach($req->fetchAll() as $post) {
        $list[] = new User($post['id_user'], $post['objet'], $post['date_rappel'], $post['id_rappel'], $post['id_user_etre_destinataire']);
        $destinataire=$post['id_user_etre_destinataire'];
        $req = $db->query("SELECT email FROM `user` WHERE id_user=$destinataire");
        foreach($req->fetchAll() as $post) {
          $tableau[] = new User($post['email'], $post['email'], $post['email'], $post['email'], $post['email'], $post['email']);
        }
      return $tableau;
      }
    return $list;
  }

  public static function createReminderTraitement() {
    $db=Db::getInstance();
    $destinataire=$_GET['destinataire'];
    $datetime=$_GET['datetime'];
    $objet=$_GET['objet'];
    $message=$_GET['message'];
    $cookie=$_COOKIE['utilisateur'];
    $today=date("Y-m-d H:i:s");
    $req="INSERT INTO `rappel` (`objet`, `date_rappel`, `message`, `date_enregistrement`, `id_user`, `id_user_etre_destinataire`) VALUES ($objet, $datetime, $message, $today, $cookie, '3')";
  }

  public static function home() {
    $list = [];
    $db=Db::getInstance();
    $cookie=$_COOKIE['utilisateur'];
    $req = $db->query("SELECT id_rappel, date_rappel, objet, email, rappel.id_user as id_destinataire
                       FROM rappel INNER JOIN user ON user.id_user = rappel.id_user_etre_destinataire
                       WHERE rappel.id_user = $cookie");
    // $reponse = $db->query($req);
    // foreach ($reponse as $info) {
    //   $slots=$info['slots'];

    foreach($req->fetchAll() as $post) {
      $list[] = new Rappel($post['id_rappel'], $post['date_rappel'], $post['objet'], $post['email'], $post['id_user'], $post['slots']);
    }
    return $list;
  }

  }

  // public static function createArdoise($prenom,$montant){
  //   $db = Db::getInstance();
  //   $req = "INSERT INTO  ardoise(prenom,montant) VALUES ('$prenom', '$montant')";
  //   $db->query($req);
  // }
  //
  // public static function updateArdoise($montant,$id){
  //   $db = Db::getInstance();
  //   $req="UPDATE ardoise set montant='$montant' WHERE id_ardoise=$id";
  //   $db->query($req);
  // }
  //
  // public static function find($id) {
  //   $db = Db::getInstance();
  //   // we make sure $id is an integer
  //   $id = intval($id);
  //   $req = $db->prepare('SELECT * FROM ardoise WHERE id_ardoise = :id');
  //   // the query was prepared, now we replace :id with our actual $id value
  //   $req->execute(array('id_ardoise' => $id));
  //   $post = $req->fetch();
  //   return new Amende($post['id_ardoise'], $post['prenom'], $post['montant']);
  // }
?>
