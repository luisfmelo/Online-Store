<?php
  include_once('../../config/init.php');
  include_once("$BASE_DIR/database/books.php");

  $categories = getBookCategories();

  /* número de livros por página */
  if(isset($_GET['number_Books']))
    $number_books_per_page = $_GET['number_Books'];
  else
    $number_books_per_page = 6;

  /* página atual */
  if(!isset($_GET['page']))
    $page = 1;
  else
	  $page = $_GET['page'];

  /* obter livros de acordo com os "parâmetros" de pesquisa seleccionados pelo utilizador */
  if (isset($_GET['id'])){
	   $number_of_books = TotalNumberBooksByCategory($_GET['id']);
     $books = listSomeBooksByCategory($_GET['id'], $_GET['sort'], $number_books_per_page, ($page-1) * $number_books_per_page);
  }
  else {
	   $number_of_books = TotalNumberSearchedBooks($_GET['search']);
     $books = listSomeBooks($_GET['search'], $_GET['sort'], $number_books_per_page, ($page-1) * $number_books_per_page);
  }

  /* controlo icons previous/next */
  $max_no_page = $number_of_books[0]['count']/ $number_books_per_page;
  if ($page >= $max_no_page)
    $next = "NOTHING_TO_SHOW";
  else
    $next = $page + 1;
  $previous = $page - 1;

  $param = "";

  if (isset($_GET['id']))
    $param = $param . "&id=" . $_GET['id'];
  if (isset($_GET['search']))
    $param = $param . "&search=" . $_GET['search'];
  if (isset($_GET['sort']))
    $param = $param . "&sort=" . $_GET['sort'];
  if (isset($_GET['number_Books']))
    $param = $param . "&number_Books=" . $_GET['number_Books'];

  $smarty->assign('page', $page);
  $smarty->assign('next', $next);
  $smarty->assign('previous', $previous);
  $smarty->assign('max_no_page', $max_no_page);
  $smarty->assign('param', $param);
  $smarty->assign('CATEGORIES', $categories);
  $smarty->assign('BOOKS', $books);

  $smarty->display('common/header.tpl');
  $smarty->display('books/list_books.tpl');
  $smarty->display('common/footer.tpl');
?>
