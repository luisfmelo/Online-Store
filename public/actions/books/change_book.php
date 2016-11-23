<?php
  include_once('../../config/init.php');
  include_once('../../database/books.php');

  $catRef = getCategoryRef($_POST['category'])[0][ref];
  $ref = $_GET['id'];

  /* Testa novos dados do livro:
        - Titulo/Autor/preço/stock teem que ser preenchidos
        - Preço e stock não podem tomar valores negativos
        - em caso de alteração de categoria, deverá ser gerada uma nova referencia
  */
  if ( $_POST['title'] === ""){
    $_SESSION['error_messages'] = 'O Titulo não pode estar em branco';
    header("Location: $BASE_URL/pages/books/edit_book.php?id=".$_GET['id']);
    exit;
  }
  else if ( $_POST['author'] === ""){
    $_SESSION['error_messages'] = 'O nome do Autor não pode estar em branco';
    header("Location: $BASE_URL/pages/books/edit_book.php?id=".$_GET['id']);
    exit;
  }
  else if ( $_POST['price'] < 0 || $_POST['price'] === ""){
    $_SESSION['error_messages'] = 'O Preço tem de ser positivo';
    header("Location: $BASE_URL/pages/books/edit_book.php?id=".$_GET['id']);
    exit;
  }
  else if ( $_POST['stock'] < 0 || $_POST['stock'] === ""){
    $_SESSION['error_messages'] = 'O Stock tem de ser positivo';
    header("Location: $BASE_URL/pages/books/edit_book.php?id=".$_GET['id']);
    exit;
  }

  // se alterar a categoria
  else if ($catRef !== strtoupper(substr($_GET['id'], 0, 3)))
  {
    $catRef = getCategoryRef($_POST['category'])[0][ref];

    do{
      // RANDOM NUMBER entre 00000 e 99999
      $categoryNumber = str_pad(rand(0, pow(10, 5)-1), 5, '0', STR_PAD_LEFT);
      $ref = $catRef . $categoryNumber; // CAT + NUMBER
    } while (refExist($ref));
  }

  updateBookInfo($_GET['id'], $ref, $_POST['title'], $_POST['author'], $_POST['price'], $_POST['category'],$_POST['stock'], $_POST['description']);

  $_SESSION['success_messages'] = 'Livro Atualizado com sucesso';

  header("Location: $BASE_URL" . '/pages/books/view_book.php?id=' . $ref);
	exit;
?>
