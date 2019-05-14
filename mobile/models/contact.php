<?php
class Contact {

  public $id_user;
  public $nom;
  public $prenom;
  public $libelle;
  public $email;

  public function __construct($id_user, $nom, $prenom, $libelle, $email) {
    $this->id_user = $id_user;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->libelle = $libelle;
    $this->email = $email;

  }

  public static function gestionContact() {
    $list = [];
    $db=Db::getInstance();
    $req = $db->query("SELECT nom, prenom, libelle, user.id_user, email
                       FROM user, contient, Groupe
                       WHERE user.id_user=contient.id_user
                       AND contient.id_groupe=groupe.id_groupe");

    foreach($req->fetchAll() as $post) {
      $list[] = new Contact($post['id_user'], $post['nom'], $post['prenom'], $post['libelle'], $post['email']);
    }
    return $list;
  }

  public static function updateContact() {
    $list = [];
    $id=$_GET['id'];
    $db=Db::getInstance();
    $req = $db->query("SELECT nom, prenom, libelle, user.id_user, email
                       FROM user, contient, Groupe
                       WHERE user.id_user=contient.id_user
                       AND contient.id_groupe=groupe.id_groupe
                       AND user.id_user=$id");

    foreach($req->fetchAll() as $post) {
      $list[] = new Contact($post['id_user'], $post['nom'], $post['prenom'], $post['libelle'], $post['email']);
    }
    return $list; 

  }



}

?>
