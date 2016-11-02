<?php
  include_once('../../config/init.php');

  foreach($_GET as $item => $qtt)
  {
    if ($qtt <= 0)
      unset($_SESSION['cart'][$item]);
    else
      $_SESSION['cart'][$item] = $qtt;
  }
  print_r($_SESSION['cart']);
  header('Location: ' . $BASE_URL . '/pages/orders/shopping_cart.php');
  exit;
?>
