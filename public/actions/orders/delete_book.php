<?php

  include_once('../../config/init.php');
  include_once($BASE_DIR .'/database/books.php');

  $ref = $_GET['ref'];

  unset($_SESSION['cart'][$ref]);

  header('Location: ' . $BASE_URL . '/pages/orders/shopping_cart.php');
  exit;

?>
