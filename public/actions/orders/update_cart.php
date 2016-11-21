<?php
  include_once('../../config/init.php');

  foreach($_GET as $item => $qtt)
  {
    if ($qtt <= 0)
      unset($_SESSION['cart'][$item]);
    else
      $_SESSION['cart'][$item] = $qtt;
  }

  // Pronto para fazer Checkout
  if ($_GET['checkout'] == 1){
    header('Location: ' . $BASE_URL . '/actions/orders/checkout.php');
    exit;
  }
  // Nenhum item no carrinho
  else if ($_GET['checkout'] == -1){
    $_SESSION['info_messages'] = "Nenhum Item no Carrinho!";
    $_SESSION['cart_counter'] = 0;
    $_SESSION['total'] = 0;
    header('Location: ' . $BASE_URL . '/pages/orders/shopping_cart.php');
    exit;
  }
  // Faz Update ao carrinho
  else {
    $_SESSION['cart_counter'] = 0;
    // update counter
    foreach($_GET as $item => $qtt)
      $_SESSION['cart_counter'] += $qtt;

    $_SESSION['success_messages'] = "Carrinho de compras atualizado Com Sucesso!";
    header('Location: ' . $BASE_URL . '/pages/orders/shopping_cart.php');
    exit;
  }
?>
