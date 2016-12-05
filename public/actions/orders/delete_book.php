<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/books.php');

  $ref = $_GET['ref'];
  $n = $_SESSION['cart'][$ref];

  unset($_SESSION['cart'][$ref]);
  $_SESSION['cart_counter'] = $_SESSION['cart_counter'] - $n;

  $_SESSION['success_messages'] = "Item eliminado com sucesso!";

  header('Location: ' . $BASE_URL . '/pages/orders/shopping_cart.php');
  exit;
?>
