<?php
  include_once('../../config/init.php');
  include_once('../../database/books.php');

  // Se não estiver houver carrinho... cria um.
  if ( is_null($_SESSION['cart']) )
    $_SESSION['cart'] = array();

  // Vai buscar o preço do livro em questão
  $arr = array(0, getBookPrice($_GET['id'])[0][price]);

  // $_SESSION['cart'] é um objecto do tipo key=>value
      //  Key:   id do livro em questão
      //  Value: array com 2 elementos: Quantidade do produto e preço
  if ( is_null($_SESSION['cart'][$_GET['id']]) )
    $_SESSION['cart'][$_GET['id']] = array( 1 , getBookPrice($_GET['id'])[0][price] );
  else {
    $qnt = $_SESSION['cart'][$_GET['id']][0] + 1;
    $_SESSION['cart'][$_GET['id']][0] = $qnt;
  }

  $_SESSION['cart_messages'] = "Livro adicionado com sucesso";

  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit;
?>
