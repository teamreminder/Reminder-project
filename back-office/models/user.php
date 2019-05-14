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
