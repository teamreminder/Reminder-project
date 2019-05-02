<?php
class Rappel {
  // we define 3 attributes
  // they are public so that we can access them using $post->prenom directly
  public $id;
  public $email;
  public $password;


  public function __construct($id, $email, $password) {
    $this->id = $id;
    $this->email = $email;
    $this->password = $password;
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

  public static function registerTraitement() {
    $db = Db::getInstance();
    $email=$_GET['email'];
    $password= hash('sha512', $_GET['password']);
    $telephone=$_GET['telephone'];
    $nom=$_GET['nom'];
    $prenom=$_GET['prenom'];
    $req = "INSERT INTO  user(email,password,telephone,nom,prenom) VALUES ('$email','$password','$telephone','$nom', '$prenom')";
    $db->query($req);
  }

  public static function connectionTraitement() {
    $list = [];
    $db = Db::getInstance();
    $email=$_GET['email'];
    $password= hash('sha512', $_GET['password']);
    $req = $db->query("SELECT id_user, email, password FROM user WHERE email='$email' AND password= '$password'");
    foreach($req->fetchAll() as $post) {
      $list[] = new Rappel($post['id_user'], $post['email'], $post['password']);
    }
    return $list;

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
}
?>
