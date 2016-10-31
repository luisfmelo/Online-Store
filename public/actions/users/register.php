<?php

  include_once('../../database/users.php');
  include_once('../../config/init.php');

  /**
    * TESTA FORMULARIO
    *   -> minimo 5 letras para user e pass
    *   -> formato de email correto
    *   -> user unico
    */

  if (!isset($_POST['username']) || !isset($_POST['password']) ||
      !isset($_POST['confirmPassword']) || !isset($_POST['email']) ) {
		$_SESSION['error_messages'] = 'Alguns campos não foram preenchidos';
		$_SESSION['form_values'] = $_POST;
		header("Location: $BASE_URL" . '/pages/users/new_regist.php');
		exit;
  }
  else if ( $_POST['password'] !== $_POST['confirmPassword']){
    $_SESSION['error_messages'] = 'Passwords não são iguais';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . '/pages/users/new_regist.php');
    exit;
  }
  else if( strlen($_POST['username']) < 5)
  {
    $_SESSION['error_messages'] = 'O Username deve ter pelo menos 5 caracteres';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . '/pages/users/new_regist.php');
    exit;
  }
  else if( strlen($_POST['password']) < 5)
  {
    $_SESSION['error_messages'] = 'A Password deve ter pelo menos 5 caracteres';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . '/pages/users/new_regist.php');
    exit;
  }
  else if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
  {
    $_SESSION['error_messages'] = 'E mail inválido';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . '/pages/users/new_regist.php');
    exit;
  }
  else if ( !userExists($_POST['username']))
  {
    $_SESSION['error_messages'] = 'Username já existe';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . '/pages/users/new_regist.php');
    exit;
  }

  $_SESSION['username'] = $_POST['username'];

  $username = $_POST['username'];
  $password = hash("sha256", $_POST['password']);
  $name 	= $_POST['name'];
  $email 	= $_POST['email'];

  addNewUser($username, $password, $email);
  header("Location: $BASE_URL" . '/pages/books/list_books.php');
  exit;
?>
