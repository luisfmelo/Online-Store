<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'/database/books.php');

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

	$max_catRef_numbers = 5;

	$title 		  	= $_POST['title'];
	$author 		  = $_POST['author'];
	$category 		= $_POST['category'];
	$price 		  	= $_POST['price'];
	$description 	= $_POST['description'];
	$stock		 	  = $_POST['stock'];

	/* Testa novos dados do livro:
        - Titulo/Autor/preço/stock teem que ser preenchidos
        - Preço e stock não podem tomar valores negativos
        - em caso de alteração de categoria, deverá ser gerada uma nova referencia
  */
  if ( $title === ""){
    $_SESSION['error_messages'] = 'O Titulo não pode estar em branco';
    header("Location: $BASE_URL/pages/books/edit_book.php?id=".$_GET['id']);
    exit;
  }
  else if ( $author === ""){
    $_SESSION['error_messages'] = 'O nome do Autor não pode estar em branco';
    header("Location: $BASE_URL/pages/books/edit_book.php?id=".$_GET['id']);
    exit;
  }
  else if ( $price < 0 || $price === ""){
    $_SESSION['error_messages'] = 'O Preço tem de ser positivo ou igual a 0';
    header("Location: $BASE_URL/pages/books/edit_book.php?id=".$_GET['id']);
    exit;
  }
  else if ( $stock < 0 || $stock === ""){
    $_SESSION['error_messages'] = 'O Stock tem de ser positivo ou igual a 0';
    header("Location: $BASE_URL/pages/books/edit_book.php?id=".$_GET['id']);
    exit;
  }

	$categoryId = getCategoryId($category);

	// generate book's ref
	$shorterCategory = strtoupper(substr($category, 0, 3)); // PICK CAT

	do{
		// RANDOM NUMBER entre 00000 e 99999
		$categoryNumber = str_pad(rand(0, pow(10, $max_catRef_numbers)-1), $max_catRef_numbers, '0', STR_PAD_LEFT);
		$ref = $shorterCategory . $categoryNumber; // CAT + NUMBER
	} while (refExist($ref));

  addNewBook($ref, $title, $author, $price, $categoryId[0]['id'], $description,  $stock);

  //add cover image
  if ($_FILES['bookcover']['size'] !=0){

	   if ($_FILES['bookcover']['type'] == "image/png"){

			$originalFileName = $IMG_DIR . '/covers/' . $ref . '.png';

			print_r("original file name: " .$originalFileName. "---");

			move_uploaded_file($_FILES['bookcover']['tmp_name'], $originalFileName);

			$result = @imagecreatefrompng($originalFileName);

			if(!$result){
				unlink($IMG_DIR . '/covers/' . $ref . '.png');
				$_SESSION['error_messages'] = 'Upload failed';
			}

	  }
	  else{
		$_SESSION['error_messages'] = 'Formato Inválido - Introduza Imagem com Extensão PNG';
	  }
  }


	header("Location: " . $BASE_URL . '/pages/books/view_book.php?id='.$ref);
	exit;
?>
