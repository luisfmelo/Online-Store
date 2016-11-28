<?php
  include_once('../../database/users.php');
  include_once('../../config/init.php');

  $password_was_set = 0;

  /* Testa novos dados do User:
        - Password em branco -> não pretende altera-la
        - Password com 5 ou mais caracteres
        - Telefone tem que ter 9 caracteres (numéricos)
        - Email tem que obedecer ao estilo xx@yy.zz
  */
  if ( $_POST['password'] !== ""){
	  $password_was_set = 1;
    if ( $_POST['password'] !== $_POST['confirmPassword']){
			$_SESSION['special_error_messages'] = 'Passwords não são iguais';
			header("Location: $BASE_URL" . '/pages/users/edit_profile.php');
			exit;
		}
	  else if( strlen($_POST['password']) < 5){
			$_SESSION['special_error_messages'] = 'A Password deve ter pelo menos 5 caracteres';
			header("Location: $BASE_URL" . '/pages/users/edit_profile.php');
			exit;
	  }
  }
  else if( strlen($_POST['phone']) != 9 || !ctype_digit($_POST['phone'])){
    $_SESSION['special_error_messages'] = 'O seu telefone não tem 9 digitos ou contém caracteres inválidos';
    header("Location: $BASE_URL" . '/pages/users/edit_profile.php');
    exit;
  }
  else if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $_SESSION['special_error_messages'] = 'Email inválido';
    header("Location: $BASE_URL" . '/pages/users/edit_profile.php');
    exit;
  }

  $username = $_SESSION['username'];
  $name 	= $_POST['name'];
  $phone    = $_POST['phone'];
  $address  = $_POST['address'];
  $email 	= $_POST['email'];

  editUser($username, $name, $phone, $address, $email);

  if ($password_was_set){
	  $password = hash("sha256", $_POST['password']);

    editUserPass($username, $password);
  }

  $_SESSION['success_messages'] = 'Dados Pessoais alterados com sucesso.';

  header("Location: $BASE_URL" . '/pages/users/view_profile.php');
	exit;
?>
