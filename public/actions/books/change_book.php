<?php

  include_once('../../database/users.php');
  include_once('../../config/init.php');

  $password_was_set = 0;

  //~ if (!isset($_POST['password'])	||
      //~ !isset($_POST['name']) 		||
      //~ !isset($_POST['email']) 		||
      //~ !isset($_POST['phone']) 		||
      //~ !isset($_POST['address'])		||
       //~ !isset($_POST['confirmPassword'])) {
		//~ $_SESSION['error_messages'] = 'Alguns campos não foram preenchidos';
		//~ $_SESSION['form_values'] = $_POST;
		//~ header("Location: $BASE_URL" . '/pages/users/edit_profile.php');
		//~ exit;
  //~ }
  //~ if ( empty($_POST['password'])	||
            //~ empty($_POST['name'])		||
            //~ empty($_POST['email'])      ||
            //~ empty($_POST['phone'])		||
            //~ empty($_POST['address'])	||
            //~ empty($_POST['confirmPassword']) ){
		//~ $_SESSION['error_messages'] = 'Alguns campos não foram preenchidos';
		//~ $_SESSION['form_values'] = $_POST;
		//~ header("Location: $BASE_URL" . '/pages/users/edit_profile.php');
		//~ exit;
  //~ }
  if ( $_POST['password'] !== ""){
	  $password_was_set = 1;
      if ( $_POST['password'] !== $_POST['confirmPassword']){
				$_SESSION['error_messages'] = 'Passwords não são iguais';
				$_SESSION['form_values'] = $_POST;
				header("Location: $BASE_URL" . '/pages/users/edit_profile.php');
				exit;
			}
	  else if( strlen($_POST['password']) < 5){
			$_SESSION['error_messages'] = 'A Password deve ter pelo menos 5 caracteres';
			$_SESSION['form_values'] = $_POST;
			header("Location: $BASE_URL" . '/pages/users/edit_profile.php');
			exit;
	  }
  }
  else if( strlen($_POST['phone']) != 9 || !ctype_digit($_POST['phone'])){
    $_SESSION['error_messages'] = 'O seu telefone não tem 9 digitos ou contém caracteres inválidos';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . '/pages/users/edit_profile.php');
    exit;
  }
  else if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $_SESSION['error_messages'] = 'Email inválido';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . '/pages/users/edit_profile.php');
    exit;
  }

  $username = $_SESSION['username'];
  $name 	= $_POST['name'];
  $phone    = $_POST['phone'];
  $address  = $_POST['address'];
  $email 	= $_POST['email'];

  editUser($username, $name, $phone, $address, $email);

  if ($password_was_set == 1){
	 $password = hash("sha256", $_POST['password']);
	 editUserPass($username, $password);
  }

  header("Location: $BASE_URL" . '/pages/users/view_profile.php');
	exit;
?>
