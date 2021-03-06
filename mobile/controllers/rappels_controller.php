<?php
class RappelsController {

  public function index() {
    // we store all the posts in a variable
    $posts = User::all();
    $posts = User::deconnection();
    require_once('views/rappels/index.php');
  }

  public function home() {
    if (isset($_COOKIE['utilisateur'])) {
      $posts = Rappel::home();
      $value = Rappel::slots();
    }
    require_once('views/rappels/home.php');
}

  public function mailing() {
    $posts = Rappel::mailing();
    require_once('views/rappels/mailing.php');
  }

  public function passwordForget() {
    require_once('views/rappels/password_forget.php');
  }

  public function passwordForgetTraitement() {
    $posts = User::passwordForget();
    require_once('views/rappels/password_forget_traitement.php');
  }

  public function monCompte() {
    $posts = User::monCompte();
    require_once('views/rappels/mon_compte.php');
  }

  public function monCompteTraitement() {
    $posts = User::monCompteTraitement();
    require_once('views/rappels/mon_compte_traitement.php');
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
    // $posts = Contact::gestionGroupe();
    require_once('views/rappels/gestion_group.php');
  }

  public function createReminder() {

    require_once('views/rappels/create_reminder.php');

  }

  public function blacklist() {
    if (isset($_COOKIE['utilisateur'])) {
    $posts = Rappel::blacklist();
  }

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

  public function deleteContact() {
    if (isset($_COOKIE['utilisateur'])) {
    $posts = Contact::deleteContact();
  }
    require_once('views/rappels/delete_contact_traitement.php');
  }

  public function deleteRappel() {
    if (isset($_COOKIE['utilisateur'])) {
    $posts = Rappel::deleteRappel();
  }
    require_once('views/rappels/delete_rappel_traitement.php');
  }

  public function updateReminder() {
    $posts = Rappel::updateReminder();
    require_once('views/rappels/update_reminder.php');
  }

  public function updateReminderTraitement() {
    $posts = Rappel::updateReminderTraitement();
    require_once('views/rappels/update_reminder_traitement.php');
  }

  public function registerByMailTraitement() {
    $posts = User::registerByMailTraitement();
    require_once('views/rappels/accept_by_mail.php');
  }

  public function refuseByMailTraitement() {
    $posts = User::refuseByMailTraitement();
    require_once('views/rappels/refuse_by_mail.php');
  }



}
?>
