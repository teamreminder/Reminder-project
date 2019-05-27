<?php
class RappelsController {
  public function index() {
    // we store all the posts in a variable
    $posts = User::all();
    require_once('views/rappels/index.php');
  }


  public function home() {
    if (isset($_COOKIE['utilisateur'])) {
      $posts = Rappel::home();
      $value = Rappel::slots();
    }
    require_once('views/rappels/home.php');
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

  public function mailing() {
    $posts = Rappel::mailing();
    require_once('views/rappels/mailing.php');
  }

  public function register() {
    require_once('views/rappels/register.php');
  }

  public function registerTraitement() {
    // we store all the posts in a variable
    $posts = User::registerTraitement();
    require_once('views/rappels/register_traitement.php');
  }

  public function connection() {
    $posts = User::connectionTraitement();
    require_once('views/rappels/connection.php');
  }

  public function gestionContact() {
    if (isset($_COOKIE['utilisateur'])) {
    $posts = Contact::gestionContact();
  }
    require_once('views/rappels/gestion_contact.php');
  }

  public function createContact() {
    if (isset($_COOKIE['utilisateur'])) {
    require_once('views/rappels/create_contact.php');
    }
  }

  public function gestionGroup() {
    require_once('views/rappels/gestion_group.php');
  }

  public function createReminder() {
    require_once('views/rappels/create_reminder.php');
  }

  public function createReminderTraitement() {
    $posts = Rappel::createReminderTraitement();
    require_once('views/rappels/create_reminder_traitement.php');
  }

  public function CreateContactTraitement() {
    if (isset($_COOKIE['utilisateur'])) {
    $posts = Contact::CreateContactTraitement();
  }
    require_once('views/rappels/create_contact_traitement.php');
  }

  public function updateContact() {
    if (isset($_COOKIE['utilisateur'])) {
    $posts = Contact::updateContact();
  }
    require_once('views/rappels/update_contact.php');
  }

  public function UpdateContactTraitement() {
    if (isset($_COOKIE['utilisateur'])) {
    $posts = Contact::updateContactTraitement();
  }
    require_once('views/rappels/update_contact_traitement.php');
  }

  public function updateReminder() {
    $posts = Rappel::updateReminder();
    require_once('views/rappels/update_reminder.php');
  }

  public function updateReminderTraitement() {
    $posts = Rappel::updateReminderTraitement();
    require_once('views/rappels/update_reminder_traitement.php');
  }

  public function registerByMail() {
    require_once('views/rappels/register_by_mail.php');
  }

  public function registerByMailTraitement() {
    $posts = User::registerByMailTraitement();
    require_once('views/rappels/register_by_mail_traitement.php');
  }

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


}
?>
