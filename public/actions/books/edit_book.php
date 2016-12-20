<?php
  include_once('../../config/init.php');
  include_once('../../database/books.php');

  $title 		  = $_POST['title'];
  $author 		  = $_POST['author'];
  $category 	  = $_POST['category'];
  $price 		  = $_POST['price'];
  $description 	  = $_POST['description'];
  $stock		  = $_POST['stock'];
  $state 		  = $_POST['state'];
  
  $catRef = getCategoryRef($category)[0][ref];
  $ref = $_GET['id'];
  
  if($_FILES['bookcover']['size']!=0)
	$newFileUploaded = true;
  else
	$newFileUploaded = false;


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

  // se alterar a categoria
  else if ($catRef !== strtoupper(substr($_GET['id'], 0, 3)))
  {
    $catRef = getCategoryRef($category)[0][ref];

    do{
      // RANDOM NUMBER entre 00000 e 99999
      $categoryNumber = str_pad(rand(0, pow(10, 5)-1), 5, '0', STR_PAD_LEFT);
      $ref = $catRef . $categoryNumber; // CAT + NUMBER
    } while (refExist($ref));
    
    print_r($_GET['id'].'.png');

    if (file_exists($BASE_URL.'/images/covers/'.$_GET['id'].'.png') && ($newFileUploaded == false))
		rename($BASE_URL.'/images/covers/'.$_GET['id'].'.png', $BASE_URL.'/images/covers/'.$ref.'.png');
	
  }
  
  if($state == 'ativo')
	$active = TRUE;
  
  else
	$active = FALSE; 
	
	print_r($active?"s":"n");
	
	print_r("OKK");

  updateBookInfo($_GET['id'], $ref, $title, $author, $price, $category,$stock, $description, $active);
  
  print_r("here");
  
  if ($newFileUploaded){
		
	    if ($_FILES['bookcover']['type'] == "image/png"){

			$originalFileName = $IMG_DIR . '/covers/tmp.png';
			
			move_uploaded_file($_FILES['bookcover']['tmp_name'], $originalFileName);

			$result = @imagecreatefrompng($originalFileName);
			
			if(!$result)
				$_SESSION['error_messages'] = 'Upload failed';			
			else			
				rename($IMG_DIR . '/covers/tmp.png', $originalFileName = $IMG_DIR . '/covers/' . $ref . '.png' );
		}	
		  else
			$_SESSION['error_messages'] = 'Formato Inválido - Introduza Imagem com Extensão PNG';
				 
  }
	
	if($_SESSION['error_messages'] == "")  
		$_SESSION['success_messages'] = 'Livro Atualizado com sucesso';
	
	header("Location: $BASE_URL" . '/pages/books/view_book.php?id=' . $ref);
	exit;
?>

