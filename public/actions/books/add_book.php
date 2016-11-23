<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'/database/books.php');

	$max_catRef_numbers = 5;

	$title 		  	= $_GET['title'];
	$author 		  = $_GET['author'];
	$category 		= $_GET['category'];
	$price 			  = $_GET['price'];
	$description 	= $_GET['description'];
	$stock		 	  = $_GET['stock'];

	$categoryId = getCategoryId($category);

	/* generate book's ref*/
	$shorterCategory = strtoupper(substr($category, 0, 3)); // PICK CAT

	do{
		// RANDOM NUMBER entre 00000 e 99999
		$categoryNumber = str_pad(rand(0, pow(10, $max_catRef_numbers)-1), $max_catRef_numbers, '0', STR_PAD_LEFT);
		$ref = $shorterCategory . $categoryNumber; // CAT + NUMBER
	} while (refExist($ref));

	addNewBook($ref, $title, $author, $price, $categoryId[0]['id'], $description,  $stock);

	header("Location: " . $BASE_URL . '/pages/books/view_book.php?id='.$ref);
	exit;
?>
