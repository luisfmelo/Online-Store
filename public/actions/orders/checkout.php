<?php
  include_once('../../config/init.php');
  include_once('../../database/orders.php');

  // Gerar Referencia da Encomenda to estilo Exxxxxxx (x: numero)
  $referencia = "E" . str_pad(rand(0, pow(10,7) - 1), 7, '0', STR_PAD_LEFT);

  // Atualizo Encomendas
  new_Order($referencia, $_SESSION['cart']['total']);

  // Atualizo Produtos Encomendados
  add_Books_to_Order($referencia);

  //atualizo stock
  updateStock();

  // resetar carrinho
  unset($_SESSION['cart']);

  $_SESSION['success_messages'] = "Encomenda efetuada com Sucesso!";

  // redirect
  header('Location: ' . $BASE_URL . '/pages/books/list_books.php');
  exit;
?>
