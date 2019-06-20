<?php
class AdminController {

  public function indexAdministrateur(){
    require_once('views/rappels/index_admin.php');
  }

  public function homeBackOffice(){
    $posts = Admin::all();
    require_once('views/rappels/home_back_office.php');
  }

  public function connection() {
    $posts = Admin::connectionTraitement();
    require_once('views/rappels/connect_back_office_traitement.php');
  }

  public function listUser() {
    $posts = Admin::all();
    require_once('views/rappels/list_user.php');
  }

  public function authentification_by_mail() {
    $posts = Admin::authentification_by_mail();
    require_once('views/rappels/authentification_by_mail.php');
  }

}
?>
