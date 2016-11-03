<?php
  include_once('../../config/init.php');

  foreach($_GET as $item => $qtt)
  {
    if ($qtt <= 0)
      unset($_SESSION['cart'][$item]);
    else
      $_SESSION['cart'][$item][0] = $qtt;
  }

  if ($_GET['checkout'] == 1){
    header('Location: ' . $BASE_URL . '/actions/orders/checkout.php');
    exit;
  }
  else{
    header('Location: ' . $BASE_URL . '/pages/orders/shopping_cart.php');
    exit;
  }
?>
