<?php

function Login($username, $password, $conn)
{

  unset($_SESSION['user']);
  unset($_SESSION['pass']);

  $where = 'user_name ="'.$username.'" && user_pass = "'.$password.'"';

  if ($result = SqlSelect('*','user',$where, $conn)) {

    $user = Fetch($result);

    $_SESSION['ID'] = $user['user_id'];

    if (ReNewSession($conn, $user['user_id']) === TRUE) {

      $sha_gen = hash('SHA512', time());
      if (SqlUpdate('user','user_token="'.$sha_gen.'"','user_id='.$user['user_id'],$conn)) {

        $_SESSION['TOKEN'] = $sha_gen;

        //retorna falso para emitir mensaje de error;
        return FALSE;

      } else {

        $error = 'no se ha actualizado correctamente sus datos. Por favor intente luego';
        return $error;

      }

    } else {

      $error = 'Ha ocurrido un error actualizando su sessión. Por favor intente de nuevo.';
      return $error;

    }

  } else {

    $error = 'Algunos datos están incorrectos, por favor verifique.';
    return $error;

  }

}

?>
