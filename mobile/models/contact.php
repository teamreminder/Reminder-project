<?php
class Contact {

  public $id_user;
  public $nom;
  public $prenom;
  public $libelle;
  public $email;

  public function __construct($id_user, $email, $idUserLiaison) {
    $this->id_user = $id_user;
    $this->email = $email;
    $this->idUserLiaison = $idUserLiaison;
  }

  public static function gestionContact() {
    $list = [];
    $db=Db::getInstance();
    $cookie=$_COOKIE['utilisateur'];
    $req = $db->query("SELECT email, liaison.id_user, id_user_liaison
                       FROM liaison
                       INNER JOIN user ON user.id_user = liaison.id_user_liaison
                       WHERE liaison.id_user = '$cookie' ");

    foreach($req->fetchAll() as $post) {
      $list[] = new Contact($post['id_user'], $post['email'], $post['id_user_liaison']);
    }
    return $list;
  }

  // public static function gestionGroupe() {
  //   $list = [];
  //   $db=Db::getInstance();
  //   $cookie=$_COOKIE['utilisateur'];
  //   $req = $db->query("SELECT libelle, count(contient.id_user) as id_user, contient.id_groupe as id_groupe
  //                      FROM contient
  //                      INNER JOIN user ON user.id_user = contient.id_user
  //                      WHERE contient.id_user = '$cookie'");
  //
  //   foreach($req->fetchAll() as $post) {
  //     $list[] = new Contact($post['id_user'], $post['libelle'], $post['id_groupe']);
  //   }
  //   return $list;
  // }


  public static function createContactTraitement() {
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
    $email=$_GET['email'];
    $pwd = pwdGen();
    $password= hash('sha512', $pwd);
    $cookie=$_COOKIE['utilisateur'];
    $nom=$_GET['nom'];
    $prenom=$_GET['prenom'];

    $requete="SELECT * FROM user WHERE email='$email'";
    $result=$db->query($requete);
    foreach ($result as $value)
    {
      $mail=$value['email'];
    }
      if (isset($_GET['email']) && !empty($_GET['email']) && (strlen($_GET['email']) <= 300) &&
          isset($_GET['prenom']) && !empty($_GET['prenom']) && (strlen($_GET['prenom']) <=50) &&
          isset($_GET['nom']) && !empty($_GET['nom']) && (strlen($_GET['nom']) <=50))
          {
            if (isset($mail)) {
              $requete1 = "SELECT id_user FROM user WHERE email='$email'";
              $variable=$db->query($requete1);
              foreach ($variable as $value) {
                $id_liaison=$value['id_user'];
              }
              $requete2 = "INSERT INTO liaison(id_user,id_user_liaison) VALUES ('$cookie','$id_liaison')";
              $db->query($requete2);
              echo "<div class='container'><p>Utilisateur a bien été ajouté à vos contacts</p></div>";
            }else{
              echo "<div class='container'><p>L'utilisateur a bien été créé !</p></div>";
              $req = "INSERT INTO  user(email,nom,prenom,password) VALUES ('$email','$nom', '$prenom','$password')";
              $req2 = "INSERT INTO liaison(id_user,id_user_liaison) VALUES ('$cookie',(SELECT id_user FROM user WHERE email='$email'))";
              $db->query($req);
              $db->query($req2);

            }

      }else{
        echo "<div class='container'><p>Formulaire mal remplie</p></div>";
      }

  }
// !isset($mail)
  public static function updateContact() {
    $list = [];
    $db=Db::getInstance();
    $id=$_GET['id'];
    $cookie=$_COOKIE['utilisateur'];
    $req = $db->query("SELECT id_user, prenom, email, nom
                       FROM user
                       WHERE id_user = '$id' ");

    foreach($req->fetchAll() as $post) {
      $list[] = new Contact($post['prenom'], $post['email'], $post['nom']);
    }
    return $list;
  }

  public static function updateContactTraitement() {
    $list = [];
    $db=Db::getInstance();
    $id=$_GET['id'];
    $prenom=$_GET['prenom'];
    $nom=$_GET['nom'];
    $email=$_GET['email'];

    $req = "UPDATE user SET prenom='$prenom', nom='$nom', email='$email'
                       WHERE id_user = '$id' ";

    $db->query($req);
   }

   public static function deleteContact() {
     $db=Db::getInstance();
     $id=$_GET['id'];
     $requete="DELETE  FROM liaison WHERE id_user_liaison=$id";
     $db->query($requete);
   }
}

?>
