<?php
class Rappel {
  public $id_rappel;
  public $destinataire;
  public $objet;
  public $date_rappel;
  public $message;
  public $slots;


  public function __construct($id_rappel, $destinataire, $objet, $date_rappel, $message, $slots) {
    $this->id_rappel = $id_rappel;
    $this->destinataire = $destinataire;
    $this->objet = $objet;
    $this->date_rappel = $date_rappel;
    $this->message = $message;
    $this->slots = $slots;
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
    $req = $db->query("SELECT user.id_user, destinataire, message, nom, prenom, objet, date_rappel, slots
            FROM user,envoyer,rappel
            WHERE user.id_user=$cookie
            AND user.id_user=envoyer.id_user
            AND envoyer.id_rappel=rappel.id_rappel");
    // $reponse = $db->query($req);
    // foreach ($reponse as $info) {
    //   $slots=$info['slots'];

    foreach($req->fetchAll() as $post) {
      $list[] = new Rappel($post['id_user'], $post['destinataire'], $post['objet'], $post['date_rappel'], $post['message'], $post['slots']);
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
