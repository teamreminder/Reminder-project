<?php

class User {
  // we define 3 attributes
  // they are public so that we can access them using $post->prenom directly
  public $id;
  public $email;
  public $password;
  public $date_rappel;
  public $message;

  public function __construct($id, $email, $password) {
    $this->id = $id;
    $this->email = $email;
    $this->password = $password;
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
    $req = "SELECT id_user, email, password FROM user WHERE email='$email' AND password= '$password'";
    $reponse=$db->query($req);
    $tableau=$reponse->fetch();
    $req = $db->query("SELECT id_user, email, password FROM user WHERE email='$email' AND password= '$password'");
    foreach($req->fetchAll() as $post) {
      $list[] = new User($post['id_user'], $post['email'], $post['password']);
    }
      return $list;
    }
}

 ?>
