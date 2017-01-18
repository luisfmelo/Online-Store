<?php
  include_once('../../config/init.php');
  include_once("$BASE_DIR/database/books.php");
  include_once("$BASE_DIR/database/users.php");

  $_SESSION['redirect'] = $BASE_URL . "/" . $BASE_URL . $_SERVER['REQUEST_URI'];

  $categories = getBookCategories();

  /* número de livros por página */
  $n_books_per_page = isset($_GET['number_Books']) ? $_GET['number_Books'] : 6;

  /* página atual */
  $page = isset($_GET['page']) ? $_GET['page'] : 1;

  /* obter livros de acordo com os "parâmetros" de pesquisa seleccionados pelo utilizador */
  if (isset($_GET['id'])){
	   //$number_of_books = TotalNumberBooksByCategory($_GET['id'])[0]['count'];
     //$books = listSomeBooksByCategory($_GET['id'], $_GET['sort'], $n_books_per_page, ($page-1) * $n_books_per_page);
     print_r($_GET);

  }
  else {
	   $number_of_books = TotalNumberSearchedBooks($_GET['search'])['count'];
     $books = listSomeBooks($_GET['search'], $_GET['sort'], $n_books_per_page, ($page-1) * $n_books_per_page);
  }

  /* controlo icons previous/next */
  $max_no_page = $number_of_books/ $n_books_per_page;
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

//Get favourite books for this user into array
  $res = getFavouriteBooks($_SESSION['username']);
  $fav = array();
  foreach ($res as $key => $value) {
    $fav[] = $value[ref];
  }

  $smarty->assign('page', $page);
  $smarty->assign('next', $next);
  $smarty->assign('previous', $previous);
  $smarty->assign('max_no_page', $max_no_page);
  $smarty->assign('param', $param);
  $smarty->assign('CATEGORIES', $categories);
  $smarty->assign('BOOKS', $books);
  $smarty->assign('FAVOURITES', $fav);

  $smarty->display('common/header.tpl');
  $smarty->display('books/list_books.tpl');
  $smarty->display('common/footer.tpl');
?>
