<!DOCTYPE html>
<html>
  <head>
    <title>Blooks: Log in</title>
    <meta charset="utf-8">

    <!-- Include da font-stack escolhida -->
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Quicksand" rel="stylesheet">
    <!-- Include da nossa folha de estilos CSS -->
    <link rel="stylesheet" href="{$BASE_URL}/css/style.css">
    <!-- Include Font Awesome lib - for icons -->
    <link rel="stylesheet" href="{$BASE_URL}/libs/font-awesome-4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="authent_bckgd_img"></div>
    <form class="login-form" action="{$BASE_URL}/actions/users/login.php" method="post">

      <a href="{$BASE_URL}/index.php" id="auth_logo">
        <img src="{$BASE_URL}/images/logo.png" alt="" />
      </a>

      <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username" value="{$FORM_VALUES.username}">
        <i class="fa fa-user"></i>
      </div>

      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" value="{$FORM_VALUES.password}">
        <i class="fa fa-lock"></i>
      </div>

      <div class="messages msg_forms" style="margin-top: 10px;">
        {include file='_messages/error_success_msgs.tpl'}
      </div>

      <input type="submit" class="log-btn" value="Log in" />

      <div class="goToRegister">
        Não tem conta?
  			<a href="{$BASE_URL}/pages/users/new_regist.php">
          Registe-se <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
  		</div>


    </form>
  </body>
  <script src="{$BASE_URL}/libs/jquery/jquery-3.1.1.min.js"></script>
  <script src="{$BASE_URL}/js/validate.js"></script>
  <script src="{$BASE_URL}/js/main.js"></script>
</html>
