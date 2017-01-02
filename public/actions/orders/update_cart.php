<?php
  include_once('../../config/init.php');

  $_SESSION['redirect'] = $BASE_URL . "/" . $BASE_URL . $_SERVER['REQUEST_URI'];

  if (isset($_GET['error']))
  {
    $_SESSION['info_messages'] = "Erro ao adicionar ao Carrinho!";
    header('Location: ' . $BASE_URL . '/pages/orders/shopping_cart.php');
    exit;
  }
  foreach($_GET as $item => $qtt)
  {
    if ($qtt <= 0)
      unset($_SESSION['cart'][$item]);
    else
      $_SESSION['cart'][$item] = $qtt;
  }

  // Nenhum item no carrinho
  if ($_SESSION['cart_counter'] <= 0){
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
