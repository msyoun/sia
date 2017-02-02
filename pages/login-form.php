<div class="login-form-wrap">
  <form class="login-form" action="index.html" method="post">
    <?php

      if (isset($error)) {
        ?>
        <div class="login-form-input-wrap">
          <div class="login-form-input-wrap error">
            <?php echo $error; ?>
          </div>
        </div>
        <?php
      }

    ?>
    <div class="login-form-input-wrap">
      <input type="text" name="user" value="" placeholder="Usuario">
    </div>
    <div class="login-form-input-wrap">
      <input type="password" name="pass" value="" placeholder="Contraseña">
    </div>
    <div class="login-form-input-wrap">
      <input type="submit" name="" value="Acceder">
    </div>
  </form>
</div>
