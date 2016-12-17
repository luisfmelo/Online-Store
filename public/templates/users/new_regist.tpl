<!DOCTYPE html>
<html>
  <head>
    <title>Blooks: Novo Registo</title>
    <meta charset="utf-8">

    <link rel="icon"
          type="image/png"
          href="{$BASE_URL}/images/icon.png">
          
    <!-- Include da font-stack escolhida -->
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Quicksand" rel="stylesheet">
    <!-- Include da nossa folha de estilos CSS -->
    <link rel="stylesheet" href="{$BASE_URL}/css/style.css">
    <!-- Include Font Awesome lib - for icons -->
    <link rel="stylesheet" href="{$BASE_URL}/libs/font-awesome-4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="authent_bckgd_img"></div>
    <form class="login-form" name="NewRegist" id="newRegist" method="post" action= "{$BASE_URL}/actions/users/register.php">

      <a href="{$BASE_URL}/index.php" id="auth_logo">
        <img src="{$BASE_URL}/images/logo.png" alt="" />
      </a>

      <!-- USERNAME -->
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username" value="{$FORM_VALUES.username}">
        <i class="fa fa-user"></i>
      </div>

      <!-- NAME -->
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Nome" name="name" value="{$FORM_VALUES.name}">
        <i class="fa fa-address-card" aria-hidden="true"></i>
      </div>

      <!-- MORADA -->
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Morada" name="address" value="{$FORM_VALUES.address}">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
      </div>

      <!-- TELEFONE -->
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Telefone" name="phone" value="{$FORM_VALUES.phone}">
        <i class="fa fa-phone"></i>
      </div>

      <!-- EMAIL -->
      <div class="form-group">
        <input type="text" class="form-control" placeholder="E-mail" name="email" value="{$FORM_VALUES.email}">
        <i class="fa fa-envelope" aria-hidden="true"></i>
      </div>

      <!-- PASSWORD -->
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" value="{$FORM_VALUES.password}">
        <i class="fa fa-lock"></i>
      </div>

      <!-- CONFIRMAR PASSWORD -->
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Confirmar Password" name="confirmPassword">
        <i class="fa fa-lock"></i>
      </div>

      <div class="messages" style="margin-top: 10px;">
        {include file='_messages/error_success_msgs.tpl'}
      </div>

      <div class="messages formMessages" style="margin-top: 20px;">
        {include file='_messages/warn_msgs.tpl'}
      </div>

      <input type="submit" class="log-btn" value="Registar" />

      <div class="goToRegister">
        Já é membro?
  			<a href="{$BASE_URL}/pages/users/login.php">
          Faça Log in <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
  		</div>

    </form>
  </body>
  <script src="{$BASE_URL}/libs/jquery/jquery-3.1.1.min.js"></script>
  <script src="{$BASE_URL}/js/validate.js"></script>
  <script src="{$BASE_URL}/js/main.js"></script>
</html>
