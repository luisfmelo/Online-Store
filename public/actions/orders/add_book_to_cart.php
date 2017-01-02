<?php
  include_once('../../config/init.php');
  include_once('../../database/books.php');

  $_SESSION['redirect'] = $BASE_URL . "/" . $BASE_URL . $_SERVER['REQUEST_URI'];

  // Se não estiver houver carrinho... cria um.
  if ( is_null($_SESSION['cart']) )
  {
    $_SESSION['cart'] = array();
    $_SESSION['cart_counter'] = 0;
  }
  // Vai buscar o preço do livro em questão
  //$arr = array(0, getBookPrice($_GET['id'])[0][price]);

  // $_SESSION['cart'] é um objecto do tipo key=>value
      //  Key:   id do livro em questão
      //  Value: Quantidade do produto e preço
  if ( is_null($_SESSION['cart'][$_GET['id']]) )
    $_SESSION['cart'][$_GET['id']] = 1;
  else {
    $qnt = $_SESSION['cart'][$_GET['id']] + 1;
    $_SESSION['cart'][$_GET['id']] = $qnt;
  }

  $_SESSION['cart_counter'] = $_SESSION['cart_counter'] + 1;
  $_SESSION['cart_messages'] = "Livro adicionado com sucesso";

  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit;
?>
