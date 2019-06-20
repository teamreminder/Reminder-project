<?php

$trueacces=$_GET['trueAcces'];
$codeAcces=$_GET['codeAcces'];
  if ($trueacces==$codeAcces) {
    setcookie('admin',$id,time()+6000);
    header("location: ?controller=admin&action=homeBackOffice");
  }else {
    echo "<div class=container>";
    echo "Erreur dans le code d'accès<br>";
    echo "<a href=?controller=admin&action=indexAdministrateur>Retour</a></div>";
  }
?>
