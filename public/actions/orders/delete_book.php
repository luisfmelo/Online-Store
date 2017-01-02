<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/books.php');

  if ( !$_SESSION['admin'] )
  {
    header("Location: " . $BASE_URL . '/pages/books/list_books.php');
    exit;
  }
    
  $ref = $_GET['ref'];
  unset($_SESSION['cart'][$ref]);
  $_SESSION['cart_counter'] = 0;

  foreach($_GET as $item => $qtt)
  {
    if ($qtt <= 0)
      unset($_SESSION['cart'][$item]);
    else
      $_SESSION['cart'][$item] = $qtt;

    $_SESSION['cart_counter'] = $_SESSION['cart_counter'] + $qtt;
  }

  $_SESSION['success_messages'] = "Item eliminado com sucesso!";

  header('Location: ' . $BASE_URL . '/pages/orders/shopping_cart.php');
  exit;
?>
