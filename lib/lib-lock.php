<?php

function CheckSession($conn) {

  $where = 'user_id = '.$_SESSION['ID'].' && user_token ='.$_SESSION['TOKEN'];

  if ($result = SqlSelect('*','user',$where,$conn)) {

    $user = Fetch($result);
    print_r($user);
    if ($user['user_exp'] > time()) {
      echo time()+360;
      $new_exp = time() + 3600;
      SqlUpdate('user', 'user_token='.$new_exp.'',$user['user_id'],$conn);

    } else {

      $error = 'Su sessión ha expirado. Por favor intente de nuevo.';
      include 'pages/login-form.php';

    }

  } else {

    $error = 'Algún dato de la sessión está corrupta. Por favor intente de nuevo.';
    include 'pages/login-form.php';

  }

}



?>
