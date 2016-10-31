<!--<?php
//  include '../common/header.php';
?>


<form method="POST" action= "<?=$BASE_URL?>/actions/users/register.php">
	<section id = "books">

		Username:			<input type = "text"		name="username"			size = 30></input> <br>
		Nome: 				<input type = "text"		name="name"				size = 30></input> <br>
		Email:				<input type = "text"		name="email"			size = 30></input> <br>
		Telefone:			<input type = "text"		name="phone"			size = 30></input> <br>
		Morada:				<input type = "text"		name="address"			size = 30></input> <br>
		Password:			<input type = "password"	name="password"			size = 30></input> <br>
		Confirmar Password: <input type = "password"	name="confirmPassword"	size = 30></input> <br>

		<input type = "submit" name="cmdsubmit" value="OK"></input>

	</section>
</form>

<?php //include '../common/footer.php';?>-->


<?php
  include_once('../../config/init.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Blooks: Novo Registo</title>

    <meta charset="utf-8">

    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="<?=$BASE_URL?>/css/style.css">
    <link rel="stylesheet" href="<?=$BASE_URL?>/libs/font-awesome-4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="authent_bckgd_img"></div>
    <form class="login-form" action="<?=$BASE_URL?>/actions/users/register.php" method="post">

      <a href="<?=$BASE_URL?>/index.php" id="auth_logo">
        <img src="<?=$BASE_URL?>/images/logo.png" alt="" />
      </a>

      <!-- USERNAME -->
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <i class="fa fa-user"></i>
      </div>

      <!-- EMAIL -->
      <div class="form-group">
        <input type="text" class="form-control" placeholder="E-mail" name="email">
        <i class="fa fa-envelope" aria-hidden="true"></i>
      </div>

      <!-- PASSWORD -->
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <i class="fa fa-lock"></i>
      </div>

      <!-- CONFIRMAR PASSWORD -->
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Confirmar Password" name="confirmPassword">
        <i class="fa fa-lock"></i>
      </div>

      <?php print_r($_SESSION); include_once('../common/error_success_msgs.php'); ?>

      <input type="submit" class="log-btn" value="Registar" />

      <div class="goToRegister">
        Já é membro?
  			<a href="<?=$BASE_URL?>/pages/users/login.php">
          Faça Log in <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
  		</div>

    </form>
  </body>
</html>
