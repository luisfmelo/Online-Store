<?php
  include_once('../../config/init.php');
  include_once('../../database/orders.php');
  include_once('../../database/books.php');

  $_SESSION['redirect'] = $BASE_URL . "/" . $BASE_URL . $_SERVER['REQUEST_URI'];

  if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
  
  if (empty($_SESSION['cart'])){
    $_SESSION['info_messages'] = "Nenhum item no Carrinho!";
    header('Location: ' . $BASE_URL . '/pages/orders/shopping_cart.php');
    exit;
  }

  foreach($_GET as $item => $qtt)
  {
    $st = getStock($item);
    if ($qtt <= 0)
      unset($_SESSION['cart'][$item]);
    else if( $st < $qtt)
      $_SESSION['cart'][$item] = $st;
    else
      $_SESSION['cart'][$item] = $qtt;
  }

  // Gerar Referencia da Encomenda to estilo Exxxxxxx (x: numero)
  $referencia = "E" . str_pad(rand(0, pow(10,7) - 1), 7, '0', STR_PAD_LEFT);

  // Atualizo Encomendas
  new_Order($referencia, $_SESSION['total']);

  // Atualizo Produtos Encomendados
  add_Books_to_Order($referencia);

  //atualizo stock
  updateStock();

  // resetar carrinho
  unset($_SESSION['cart']);
  unset($_SESSION['cart_counter']);
  unset($_SESSION['total']);

  $_SESSION['success_messages'] = "Encomenda efetuada com Sucesso!";

  // redirect
  header('Location: ' . $BASE_URL . '/pages/books/list_books.php');
  exit;
?>
