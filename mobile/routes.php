<?php
function call($controller, $action) {
  require_once('controllers/' . $controller . '_controller.php');
  switch($controller) {
    case 'pages':
    $controller = new PagesController();
    break;
    case 'rappels':
    // we need the model to query the database later in the controller
    require_once('models/rappel.php');
    require_once('models/user.php');
    require_once('models/contact.php');
    // require_once('models/admin.php');
    $controller = new RappelsController();

    break;
    case 'admin':
    require_once('models/admin.php');
    $controller = new AdminController();
  }
  $controller->{ $action }();
} 
// we're adding an entry for the new controller and its actions
$controllers = array('pages' => ['error'],
                   'rappels' => ['index', 'register', 'registerTraitement', 'connection', 'home', 'gestionContact','createContact','CreateContactTraitement','createReminder','blacklist', 'createReminderTraitement', 'gestionGroup', 'updateContact', 'mailing', 'updateReminder', 'updateReminderTraitement','UpdateContactTraitement', 'registerByMailTraitement','refuseByMailTraitement','deleteContact','passwordForget','passwordForgetTraitement','monCompte','monCompteTraitement','deleteRappel'],
                    'admin' => ['indexAdministrateur','connection','authentification_by_mail', 'homeBackOffice', 'listUser']);
if (array_key_exists($controller, $controllers)) {
  if (in_array($action, $controllers[$controller])) {
  call($controller, $action);
  } else {
  call('pages', 'error');
  }
} else {
  call('pages', 'error');
}

?>
