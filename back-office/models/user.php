<?php

class User {
  // we define 3 attributes
  // they are public so that we can access them using $post->prenom directly
  public $id;
  public $email;
  public $password;
  public $nom;
  public $prenom;
  public $slots;
  public $statut;

  public function __construct($id, $email, $password, $nom, $prenom, $slots, $statut) {
    $this->id = $id;
    $this->email = $email;
    $this->password = $password;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->slots = $slots;
    $this->statut = $statut;
    }

  public static function all() {
    $list = [];
    $db = Db::getInstance();
    $req = $db->query('SELECT * FROM user');
    // we create a list of Post objects from the database results
    foreach($req->fetchAll() as $post) {
      $list[] = new User($post['id_user'], $post['email'], $post['password'], $post['nom'], $post['prenom'], $post['slots'], $post['statut']);
    }
    return $list;
  }

  public static function connectionTraitement() {
    $list = [];
    $db = Db::getInstance();
    $email=$_GET['email'];
    $password= hash('sha512', $_GET['password']);
    $req = $db->query("SELECT id_user, email, password FROM user WHERE email='$email' AND password= '$password'");
    foreach($req->fetchAll() as $post) {
      $list[] = new User($post['id_user'], $post['email'], $post['password']);
    }
    return $list;

    }

}

 ?>
