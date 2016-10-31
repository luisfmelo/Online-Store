<?php
  include_once('../../config/init.php');
?>
<li>
  <a href="<?=$BASE_URL?>/pages/users/login.php">
    Login
  </a>
</li>
<li>
  <a href="<?=$BASE_URL?>/pages/users/new_regist.php" id="registLink">
    Registo
  </a>
</li>
<!--
<form action="<?=$BASE_URL?>/actions/users/login.php" method="post">
  <input type="text" name="username" placeholder="username">
  <input type="password" name="password" placeholder="password">

  <div class="row">
    <input type="submit" name="login" value="Login">
    <a href="<?=$BASE_URL?>/pages/users/new_regist.php">
      <input type="button" name="register" value="Registar">
    </a>
  </div>
</form>
-->
<?php
  //include_once('error_success_msgs.php');
?>
