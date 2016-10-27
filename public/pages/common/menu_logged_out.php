<?php
  include_once('../../config/init.php');
?>

<form action="<?=$BASE_URL?>/actions/users/login.php" method="post">
  <input type="text" name="username" placeholder="username">
  <input type="password" name="password" placeholder="password">

  <div class="row error_messages">
    <?php
      if ( isset($_SESSION['error_messages']) )
        foreach ( $_SESSION['error_messages'] as $error) {
          if ( $error != '' )
            echo "<span>" . $error . "</span>";
        }
    ?>
  </div>
  <div class="row">
    <input type="submit" name="login" value="Login">
    <a href="<?=$BASE_URL?>/actions/users/register.php">
      <input type="button" name="register" value="Registar">
    </a>
  </div>
</form>
