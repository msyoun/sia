<?php

include 'lib/config.php';
include 'lib/lib-sql.php';
include 'lib/lib-common.php';

session_start();
if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {

  include 'lib/lib-login.php';
  if($check = Login($_SESSION['user'],$_SESSION['pass'],$conn)) {
    $error = $check;
  }

}

if (isset($_SESSION['ID']) && isset($_SESSION['TOKEN'])) {

  //Una vez comprobado la existencia del ID y el TOKEN se incluye la conección al SQL y se verifica los datos del usuario
  if(CheckMysql($conn)){

    include 'lib/lib-lock.php';
    $check = CheckSession($conn);
    if ($check === TRUE) {

      //Cuando todos los chequeos están correctas
      echo "Por fin, llegamos al pantalla de login";

    } else {

      $error = $check;
      include 'pages/login-form.php';

    }

  } else {

    //Cuando la conexión de base de datos ha fallado
    $error = "La conexión con la base de datos ha fallado";
    include 'pages/login-form.php';

  }

} else {

  include 'pages/login-form.php';

}

?>
