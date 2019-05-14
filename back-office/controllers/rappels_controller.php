<?php
class RappelsController {
  public function index() {
    // we store all the posts in a variable
    $posts = User::all();
    require_once('views/rappels/index.php');
  }

  public function home() {
    $posts = Rappel::home();
    require_once('views/rappels/home.php');
  }

  public function connection() {
    $posts = User::connectionTraitement();
    require_once('views/rappels/connection.php');
  }

}
?>
