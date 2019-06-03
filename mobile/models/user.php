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

  public static function deconnection() {
    setcookie('utilisateur');
  }

  public static function monCompte() {
    $list = [];
    $db = Db::getInstance();
    $cookie=$_COOKIE['utilisateur'];
    $req = $db->query("SELECT email, prenom, nom FROM user WHERE id_user='$cookie'");
    foreach($req->fetchAll() as $post) {
      $list[] = new User($post['email'], $post['prenom'], $post['nom']);
    }
    return $list;
  }

  public static function monCompteTraitement() {
    $db = Db::getInstance();
    $COOKIE=$_COOKIE['utilisateur'];
    $email=$_GET['email'];
    $password=hash('sha512',$_GET['password']);
    $nom=$_GET['nom'];
    $prenom=$_GET['prenom'];
    $requete="UPDATE user SET email = '$email', password = '$password', nom = '$nom', prenom = '$prenom' WHERE id_user = '$COOKIE'";
    $result=$db->query($requete);
  }

  public static function passwordForget() {
    echo "<h3>Mot de passe oublié</h3>";
    $db = Db::getInstance();
    $mail=$_GET['email'];
    $req = "SELECT email FROM user WHERE email = '$mail'";
    $db->query($req);
    $result=$db->query($req);
    foreach ($result as $value)
    {
      $bddemail=$value['email'];
    }
    if ($_GET['email']==$value['email']) {
      $chars = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s",
       "t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M",
      "N","O","P","Q","R","S","T","U","V","W","X","Y","Z","0","1","2","3","4","5","6",
      "7","8","9","&","#","@","+","-","*","!","=","$","%",".",",",";");
      $indexMax = count($chars) - 1;
      $pwd = "";
      for($i = 0 ; $i < 10; $i++)
      {
        $newpassword .= $chars[rand(0,  $indexMax)];
      }
      $hashpassword=hash('sha512',$newpassword);
      $req2 = "UPDATE user SET password='$hashpassword' WHERE email = '$mail'";
      $db->query($req2);

      $objet="Mot de passe oublié.";
      $header="MIME-Version: 1.0\r\n";
      $header.='From:"Charlesdelpech1@gmail.com"<Charlesdelpech1@gmail.com>'."\n";
      $header.='Content-Type:text/html; charset="uft-8"'."\n";
      $header.='Content-Transfer-Encoding: 8bit';

      $message="
      <html>
        <body>
          <div align='center'>
            <h1>Reminder</h1>
          </div>
          <p>Bonjour Mme/M.<br><br>
          Nous avons reinitialisé votre mot de passe suite à votre demande.<br>
          Voici votre nouveau mot de passe : $newpassword .
        </body>
      </html>
      ";

      mail($mail,$objet,$message,$header);
      echo "<div class='container'>Nous venons d'envoyer un mail à $mail avec votre nouveau mot de passe.</div>";
    }else{
      echo "<div class='container'>Vous n'avez pas de comptes Reminder.</div>";
    }
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
