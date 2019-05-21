<?php
$destinataire=$_GET['destinataire'];
$datetime=$_GET['datetime'];
$objet=$_GET['objet'];
$message=$_GET['message'];
$cookie=$_COOKIE['utilisateur'];
$today=date("Y-m-d H:i:s");

echo $destinataire."<br>";
echo $datetime."<br>";
echo $objet."<br>";
echo $message."<br>";
echo $today."<br>";
echo "";
 ?>
