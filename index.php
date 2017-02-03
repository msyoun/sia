<?php

include 'lib/config.php';

session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['TOKEN'])) {

  //Una vez comprobado la existencia del ID y el TOKEN se incluye la conección al SQL y se verifica los datos del usuario
  include 'lib/lib-sql.php';
  if(CheckMysql($conn)){

    include 'lib/lib-lock.php';
    $check = CheckSession($conn);
    if ($check === TRUE) {

      

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
