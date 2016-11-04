<?php
  include_once('../../config/init.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Blooks: Log in</title>

    <meta charset="utf-8">

    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="<?=$BASE_URL?>/css/style.css">
    <link rel="stylesheet" href="<?=$BASE_URL?>/libs/font-awesome-4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="authent_bckgd_img"></div>
    <form class="login-form" action="<?=$BASE_URL?>/actions/users/login.php" method="post">

      <a href="<?=$BASE_URL?>/index.php" id="auth_logo">
        <img src="<?=$BASE_URL?>/images/logo.png" alt="" />
      </a>

      <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username" value="<?=$_SESSION['form_values']['username']?>">
        <i class="fa fa-user"></i>
      </div>

      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" value="<?=$_SESSION['form_values']['password']?>">
        <i class="fa fa-lock"></i>
      </div>

      <div class="messages msg_forms" style="margin-top: 10px;">
        <?php include_once('../common/error_success_msgs.php'); ?>
      </div>

      <input type="submit" class="log-btn" value="Log in" />

      <div class="goToRegister">
        Não tem conta?
  			<a href="<?=$BASE_URL?>/pages/users/new_regist.php">
          Registe-se <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
  		</div>

    </form>
  </body>
</html>
