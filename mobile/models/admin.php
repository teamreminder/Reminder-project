<?php

class Admin {
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
      $list[] = new Admin($post['id_user'], $post['email'], $post['password'], $post['nom'], $post['prenom'], $post['slots'], $post['statut']);
    }
    return $list;
  }

  public static function connectionTraitement() {
    $list = [];
    $db = Db::getInstance();
    $email=$_GET['email'];
    $password= hash('sha512', $_GET['password']);
    $req = $db->query("SELECT * FROM user WHERE email='$email' AND password= '$password'");
    foreach($req->fetchAll() as $post) {
      $list[] = new Admin($post['id_user'], $post['email'], $post['password'], $post['nom'], $post['prenom'], $post['slots'], $post['statut']);
    }
    return $list;

    }

    public function homeBackOffice(){

    }

    public static function authentification_by_mail() {
      $list = [];
      $db = Db::getInstance();
      $email=$_GET['email'];
      $password= hash('sha512', $_GET['password']);
      $req = "SELECT email, password, prenom, nom FROM user WHERE email='$email' AND password= '$password'";
      $req=$db->query($req);
      foreach ($req as $value)
      {
        $email2=$value['email'];
        $password2=$value['password'];
        $prenom=$value['prenom'];
        $nom=$value['nom'];
      }
      if (isset($email2) && isset($password2)) {
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
        $objet2="Reminder code d'accès"
        $header="MIME-Version: 1.0\r\n";
        $header.='From:"reminder.application.pro@gmail.com"<reminder.application.pro@gmail.com>'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';

        $message="
        <html>
          <body>
            <div align='center'>
              <h1>Reminder</h1>
            </div>
            <p>Bonjour Mme/M.$nom $prenom<br><br>Votre code d'accès est :<br><br>$pwd</p>
          </body>
        </html>
        ";

        mail($email2,$objet2,$message,$header);
        ?>
        <h3>Code d'accès</h3>
        <div class="container">
          <p>Nous vous avons envoyé un mail avec un code pour confirmer votre identité, veuillez inscrire le code d'accès</p>
          <form action="index.php" method="get">
            <input type="hidden" name="controller" value="admin">
            <input type="hidden" name="action" value="?????????">
            <input type="hidden" name="trueAcces" value="<?php echo $pwd; ?>">
            <div class="form-group">
              <label for="CodeAcces">Code d'accès</label>
              <input type="email" class="form-control" name="codeAcces" id="codeAcces" aria-describedby="emailHelp" placeholder="Votre code...">
            </div>
            <div class="col align-self-end">
              <button type="submit" class="btn btn-primary">VALIDER</button>
            </div>
          </form>
        </div>
        <?php
      }else {
        echo "c'est pas bon";
      }
    }

}

 ?>
