<?php

class User {
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
      $list[] = new User($post['id_user'], $post['email'], $post['password']);
    }
      return $list;
    }

    public static function CreateContactTraitement() {
      function pwdGen()
      {
        $chars = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s",
         "t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M",
        "N","O","P","Q","R","S","T","U","V","W","X","Y","Z","0","1","2","3","4","5","6",
        "7","8","9","&","#","@","+","-","*","!","=","$","%",".",",",";");
        $indexMax = count($chars) - 1;
        $pwd = "";
        for($i = 0 ; $i < 10; $i++)
        {
          $pwd .= $chars[rand(0,  $indexMax)];
        }
        return $pwd;
      }

      $db = Db::getInstance();
      $pwd = pwdGen();
      $password= hash('sha512', $pwd);
      $email=$_GET['email'];
      $nom=$_GET['nom'];
      $prenom=$_GET['prenom'];
      $req = "INSERT INTO  user(email,nom,prenom,password) VALUES ('$email','$nom', '$prenom','$password')";
      $db->query($req);
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
