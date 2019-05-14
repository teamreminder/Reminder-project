<?php
class Rappel {
  public $id_rappel;
  public $destinataire;
  public $objet;
  public $date_rappel;
  public $message;
  public $slots;


  public function __construct($id_rappel, $destinataire, $objet, $date_rappel, $message, $slots) {
    $this->id_rappel = $id_rappel;
    $this->destinataire = $destinataire;
    $this->objet = $objet;
    $this->date_rappel = $date_rappel;
    $this->message = $message;
    $this->slots = $slots;
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

  }
?>
