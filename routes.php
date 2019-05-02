<?php
function call($controller, $action) {
  require_once('controllers/' . $controller . '_controller.php');
  switch($controller) {
    case 'pages':
    $controller = new PagesController();
    break;
    case 'rappels':
    // we need the model to query the database later in the controller
    require_once('models/post.php');
    $controller = new RappelsController();

    break;
  }
  $controller->{ $action }();
}
// we're adding an entry for the new controller and its actions
$controllers = array('pages' => ['error'],
                   'rappels' => ['index', 'register', 'registerTraitement', 'connection']);
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
