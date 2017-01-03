<?php
  include_once('../config/init.php');
  include_once('../database/books.php');

  if ( $_SESSION['admin'])
    exit;

  $ref = $_GET['ref'];
  $st = getStock($ref);
  // Numero real de livros na encomenda : se for mais que o stock... é o stock
  $realNum = $_SESSION['cart'][$ref] > $st ? $st :
                                             $_SESSION['cart'][$ref];
  $price = getBookPrice($ref)[0]['price'];

  // atualizar cart_counter
  $_SESSION['cart_counter'] -= $_SESSION['cart'][$ref];

  //atualizar total
  $_SESSION['total'] -= ($realNum * $price);

  // atualizar Carrinho
  unset($_SESSION['cart'][$ref]);

  $json = array('counter' => $_SESSION['cart_counter'], 'total' => $_SESSION['total']);
	echo json_encode($json, JSON_FORCE_OBJECT);

?>
