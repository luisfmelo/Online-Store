<?php

	include_once('../../config/init.php');
	include_once('../../database/books.php');
	
	$ref 			= 	$_GET['ref'];	
	$price 			= 	$_GET['price'];
	$stock 			= 	$_GET['stock'];
	$page_number	= 	$_GET['page_number'];
	
	updateBook($ref, $price, $stock);
	
	header("Location: " . $BASE_URL . '/pages/users/stock_management.php?page_number=' . $page_number);
	
?>
