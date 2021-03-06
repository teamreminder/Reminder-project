<?php
class Db {
  private static $instance = NULL;

  private function __construct() {}

  private function __clone() {}

  public static function getInstance() {
    if (!isset(self::$instance)) {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    // self::$instance = new PDO('mysql:host=remindmeuiremind.mysql.db;dbname=remindmeuiremind', 'remindmeuiremind', 'Isfac2019', $pdo_options);
    self::$instance = new PDO('mysql:host=localhost;dbname=reminder;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    return self::$instance;
  }
}
?>
