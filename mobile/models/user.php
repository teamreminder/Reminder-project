<?php

class User {
  // we define 3 attributes
  // they are public so that we can access them using $post->prenom directly
  public $id;
  public $email;
  public $password;
  public $nom;
  public $prenom;
  public $libelle;

  public function __construct($id, $email, $password) {
    $this->id = $id;
    $this->email = $email;
    $this->password = $password;
    }

  private function getID()
  {
    return $this->_id;
  }

  private function setId($id)
  {
    $this->_id = $id;
  }

  private function getNom()
  {
    return $this->_nom;
  }

  private function setNom($nom)
  {
    $this->_nom = $nom;
  }


  public static function all() {
    $list = [];
    $db = Db::getInstance();
    $req = $db->query('SELECT * FROM user');
    // we create a list of Post objects from the database results
    foreach($req->fetchAll() as $post) {
      $list[] = new User($post['id_user'], $post['email'], $post['password']);
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
    $req = "INSERT INTO  user(email,password,nom,prenom,blacklist) VALUES ('$email','$password','$nom', '$prenom', 'non')";
    $db->query($req);
    }

  public static function registerByMailTraitement() {
    $db = Db::getInstance();
    $id=$_GET['id'];
    $prenom=$_GET['prenom'];
    $nom=$_GET['nom'];
    $password= hash('sha512', $_GET['password']);
    $telephone=$_GET['telephone'];
    $req = "UPDATE user SET telephone = '$telephone', nom = '$nom', prenom = '$prenom', password='$password', blacklist='non' WHERE user.id_user = '$id'";
    $db->query($req);
    }

  public static function connectionTraitement() {
    $list = [];
    $db = Db::getInstance();
    $email=$_GET['email'];
    $password= hash('sha512', $_GET['password']);
    $req = $db->query("SELECT id_user, email, password FROM user WHERE email='$email' AND password='$password'");
      foreach($req->fetchAll() as $post) {
        $list[] = new User($post['id_user'], $post['email'], $post['password']);
      }
    return $list;
    }

    public static function GestionGroup(){
      $db = Db::getInstance();
      $req = "SELECT * FROM groupe";
      $reponse = $db->query($req);
      foreach ($reponse as $info) {
        $id=$info['id_groupe'];
        $libelle=$info['libelle'];
      }
    }

      // public static function find($id) {
      //   $db = Db::getInstance();
      //   // we make sure $id is an integer
      //   $id = intval($id);
      //   $req = $db->prepare("SELECT * FROM user WHERE id_user = :id");
      //   // the query was prepared, now we replace :id with our actual $id value
      //   $req->execute(array('id_user' => $id));
      //   $post = $req->fetch();
      //   return new User($post['id_user'], $post['email'], $post['password']);
      // }

}

 ?>
