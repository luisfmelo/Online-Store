<?php
  include_once('../../database/users.php');
  include_once('../../config/init.php');

  /**
    * TESTA FORMULARIO
    *   -> Todos os dados devem ser preenchidos
    *   -> passwords iguais
    *   -> minimo 5 caracteres para user e pass
    *   -> phone deve ter 9 caracteres (numéricos)
    *   -> formato de email correto
    *   -> user unico
    */

    $username = strip_tags($_POST['username']);


  if (!isset($_POST['username'])        ||
      !isset($_POST['name'])            ||
      !isset($_POST['address'])         ||
      !isset($_POST['phone'])           ||
      !isset($_POST['password'])        ||
      !isset($_POST['confirmPassword']) ||
      !isset($_POST['email'])           ||
      empty($_POST['username'])         ||
      empty($_POST['name'])             ||
      empty($_POST['address'])          ||
      empty($_POST['phone'])            ||
      empty($_POST['password'])         ||
      empty($_POST['confirmPassword'])  ||
      empty($_POST['email']) ) {
		$_SESSION['error_messages'] = 'Alguns campos não foram preenchidos';
		$_SESSION['form_values'] = $_POST;
		header("Location: $BASE_URL" . '/pages/users/register.php');
		exit;
  }
  else if ( $_POST['password'] !== $_POST['confirmPassword']){
    $_SESSION['error_messages'] = 'Passwords não são iguais';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . '/pages/users/register.php');
    exit;
  }
  else if( strlen($_POST['username']) < 5)
  {
    $_SESSION['error_messages'] = 'O Username deve ter pelo menos 5 caracteres';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . '/pages/users/register.php');
    exit;
  }
  else if( strlen($_POST['phone']) != 9 || !ctype_digit($_POST['phone']))
  {
    $_SESSION['error_messages'] = 'O seu phone não tem 9 digitos ou contém caracteres inválidos';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . '/pages/users/register.php');
    exit;
  }
  else if( strlen($_POST['password']) < 5)
  {
    $_SESSION['error_messages'] = 'A Password deve ter pelo menos 5 caracteres';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . '/pages/users/register.php');
    exit;
  }
  else if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
  {
    $_SESSION['error_messages'] = 'E mail inválido';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . '/pages/users/register.php');
    exit;
  }
  else if (!userExists($username))
  {
    $_SESSION['error_messages'] = 'Username já existe';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . '/pages/users/register.php');
    exit;
  }

  $password = hash("sha256", strip_tags($_POST['password']));
  $name 	= strip_tags($_POST['name']);
  $phone    = strip_tags($_POST['phone']);
  $address  = strip_tags($_POST['address']);
  $email 	= strip_tags($_POST['email']);

  $_SESSION['success_messages'] = 'Conta criada com sucesso';
  $_SESSION['username'] = $username;

  addNewUser($username, $name, $phone, $address, $password, $email);

  if ( $REDIRECT != '' )
    header("Location: /$REDIRECT");
  else
    header("Location: $BASE_URL" . '/pages/books/list_books.php');

  exit;
?>
