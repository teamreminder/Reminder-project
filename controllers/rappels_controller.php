<?php
class RappelsController {
  public function index() {
    // we store all the posts in a variable
    $posts = rappel::all();
    require_once('views/rappels/index.php');
  }

  // public function create() {
  //   // we store all the posts in a variable
  //   $posts = Amende::createArdoise($_GET['prenom'],$_GET['montant']);
  //   require_once('views/amendes/creer_ardoise_traitement.php');
  // }
  //
  // public function admin() {
  //   $posts = Amende::all();
  //   require_once('views/amendes/admin.php');
  // }
  //
  // public function creerArdoise() {
  //   require_once('views/amendes/creer_ardoise.php');
  // }
  //
  // public function update() {
  //   require_once('views/amendes/update.php');
  // }
  //
  // public function updateTraitement() {
  //   // we store all the posts in a variable
  //   $posts = Amende::updateArdoise($_GET['montant'],$_GET['id']);
  //   require_once('views/amendes/update_traitement.php');
  // }

  public function show() {
  // we expect a url of form ?controller=posts&action=show&id=x
  // without an id we just redirect to the error page as we need the post id to find it in the database
  if (!isset($_GET['id']))
  return call('pages', 'error');
  // we use the given id to get the right post
  $post = Rappel::find($_GET['id']);
  require_once('views/amendes/show.php');
  }
}
?>
