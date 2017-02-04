<?php

function CheckSession($conn) {

  $where = 'user_id = '.$_SESSION['ID'].' && user_token ="'.$_SESSION['TOKEN'].'"';

  if ($result = SqlSelect('*','user',$where,$conn)) {

    $user = Fetch($result);

    if ($user['user_exp'] > time()) {

      if (ReNewSession($conn, $user['user_id']) === TRUE) {
        return TRUE;
      } else {
        $error = 'Ha ocurrido un error actualizando su sessión. Por favor intente de nuevo.';
        return $error;
      }

    } else {

      $error = 'Su sessión ha expirado. Por favor intente de nuevo.';
      return $error;

    }

  } else {

    $error = 'Algún dato de la sessión está corrupta. Por favor intente de nuevo.';
    return $error;

  }

}

?>
