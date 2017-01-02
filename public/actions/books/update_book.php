<?php
	include_once('../../config/init.php');
	include_once('../../database/books.php');

	$_SESSION['redirect'] = $BASE_URL . "/" . $BASE_URL . $_SERVER['REQUEST_URI'];

	if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
  else if ( !$_SESSION['admin'] )
  {
    header("Location: " . $BASE_URL . '/pages/books/list_books.php');
    exit;
  }

	$ref 	= 	$_GET['ref'];
	$price 	= 	$_GET['price'];
	$stock 	= 	$_GET['stock'];
	$page	= 	$_GET['page'];

	updateBook($ref, $price, $stock);

	header("Location: " . $BASE_URL . '/pages/users/stock_management.php?page=' . $page);
	exit;
?>
