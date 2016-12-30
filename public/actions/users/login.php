<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/users.php');

  $_SESSION['form_values'] = array();

  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);

  if (empty($username) || empty($password)) {
    $_SESSION['error_messages'] = 'Login Inválido';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . '/pages/users/login.php');
    exit;
  }

  $password = hash("sha256", $password);

  if (isLoginCorrect($username, $password)) {
    $_SESSION['username'] = $username;
    $_SESSION['admin'] = isAdmin($username);
    $_SESSION['success_messages'] = 'Login efetuado com Sucesso';
  }
  else {
    $_SESSION['error_messages'] = 'Login Falhou';
    $_SESSION['form_values'] = $_POST;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
  }

  if ( $REDIRECT != '' )
    header("Location: $REDIRECT");
  else
    header("Location: $BASE_URL" . '/pages/books/list_books.php');

  exit;
?>
