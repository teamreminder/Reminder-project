<?php
class Rappel {
  // we define 3 attributes
  // they are public so that we can access them using $post->prenom directly
  public $id;
  public $destinataire;
  public $objet;
  public $date_rappel;
  public $message;


  public function __construct($id, $destinataire, $objet, $date_rappel, $message) {
    $this->id = $id;
    $this->destinataire = $destinataire;
    $this->objet = $objet;
    $this->date_rappel = $date_rappel;
    $this->message = $message;
    }

  public static function all() {
    $list = [];
    $db = Db::getInstance();
    $req = $db->query('SELECT * FROM rappel');
    // we create a list of Post objects from the database results
    foreach($req->fetchAll() as $post) {
      $list[] = new Rappel($post['id_rappel'], $post['objet'], $post['date_rappel'], $post['message'], $post['destinataire']);
    }
    return $list;
  }

  public static function createReminderTraitement() {
    $db=Db::getInstance();
    $destinataire=$_GET['destinataire'];
    $datetime=$_GET['datetime'];
    $objet=$_GET['objet'];
    $message=$_GET['message'];
    $req="INSERT INTO rappel (destinataire, objet, date_rappel, message)";
    $req2="INSERT INTO envoyer(id_user,id_rappel,date_enregistrement)
            SELECT id_user
            FROM rappel
            WHERE destinataire='$destinataire'";
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
