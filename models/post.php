<?php
class Rappel {
  // we define 3 attributes
  // they are public so that we can access them using $post->prenom directly
  public $id;
  public $prenom;
  public $montant;


  // public function __construct($id, $prenom, $montant) {
  //   $this->id = $id;
  //   $this->prenom = $prenom;
  //   $this->montant = $montant;
  //   }
  // public static function all() {
  //   $list = [];
  //   $db = Db::getInstance();
  //   $req = $db->query('SELECT * FROM ardoise');
  //   // we create a list of Post objects from the database results
  //   foreach($req->fetchAll() as $post) {
  //     $list[] = new Amende($post['id_ardoise'], $post['prenom'], $post['montant']);
  //   }
  //   return $list;
  // }
  //
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
}
?>