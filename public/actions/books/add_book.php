<?php
	
	header('Content-Type: charset=utf-8');
	
	$max_catRef_numbers = 5;
	
	$title 			= $_GET['title'];
	$author 		= $_GET['author'];
	$category 		= $_GET['category'];
	$price 			= $_GET['price'];
	$description 	= $_GET['descriptiion'];
	$stock		 	= $_GET['stock'];

	/* title and author can't be null */
	if( (strlen($title)==0) OR (strlen($author)==0))
		print_r("Titulo e Autor não podem ser nulos");

	/* check if stock and price are not letters */
	
	
	/* stock must be a positive value */		
	if (stock < 0)
		print_r("Check stock - it must be greater or equal to 0");
	
	/* price - replace , for . */
	$price = str_replace(',', '.', $price);
	print_r($price);
	
	/*price must be a positive value */
	if ($price <= 0)
		print_r("Check price - it must be greater or equal to 0");
	
		
	/* generate book's ref*/
	
	/* pick category */
	$short_category = substr($category, 0, 3);
	print_r($short_category);
	
	$no_cat = str_pad(rand(0, pow(10, $max_catRef_numbers)-1), $max_catRef_numbers, '0', STR_PAD_LEFT);
	print_r($no_cat);
	
	$ref = $short_category . $no_cat; 
	print_r($ref);
	
?>	
