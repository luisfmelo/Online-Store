<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/users.php');

  $_SESSION['form_values'] = array();

  if (!$_POST['username'] || !$_POST['password']) {
    $_SESSION['error_messages'] = 'Login Inválido';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . '/pages/users/login.php');
    exit;
  }

  $username = $_POST['username'];
  $password = hash("sha256", $_POST['password']);

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

  header("Location: $BASE_URL" . '/pages/books/list_books.php');
  exit;
?>
