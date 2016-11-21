<?php
  include_once('../../database/users.php');
  include_once('../../config/init.php');

  /**
    * TESTA FORMULARIO
    *   -> Todos os dados devem ser preenchidos
    *   -> passwords iguais
    *   -> minimo 5 caracteres para user e pass
    *   -> telefone deve ter 9 caracteres (numéricos)
    *   -> formato de email correto
    *   -> user unico
    */

  if (!isset($_POST['username'])        ||
      !isset($_POST['nome'])            ||
      !isset($_POST['morada'])          ||
      !isset($_POST['telefone'])        ||
      !isset($_POST['password'])        ||
      !isset($_POST['confirmPassword']) ||
      !isset($_POST['email']) ) {
		$_SESSION['error_messages'] = 'Alguns campos não foram preenchidos';
		$_SESSION['form_values'] = $_POST;
		header("Location: $BASE_URL" . '/pages/users/new_regist.php');
		exit;
  }
  else if ( empty($_POST['username'])        ||
            empty($_POST['nome'])            ||
            empty($_POST['morada'])          ||
            empty($_POST['telefone'])        ||
            empty($_POST['password'])        ||
            empty($_POST['confirmPassword']) ||
            empty($_POST['email']) ) {
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
  else if( strlen($_POST['telefone']) != 9 || !ctype_digit($_POST['telefone']))
  {
    $_SESSION['error_messages'] = 'O seu telefone não tem 9 digitos ou contém caracteres inválidos';
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

  $username = strip_tags($_POST['username']);
  $password = hash("sha256", $_POST['password']); //strip_tags(?)
  $name 	= strip_tags($_POST['nome']);
  $phone    = strip_tags($_POST['telefone']);
  $address  = strip_tags($_POST['morada']);
  $email 	= strip_tags($_POST['email']);

  addNewUser($username, $name, $phone, $address, $password, $email);
  header("Location: $BASE_URL" . '/pages/books/list_books.php');
  exit;
?>
