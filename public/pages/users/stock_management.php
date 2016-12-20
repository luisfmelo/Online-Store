<?php
	include_once('../../config/init.php');
  include_once('../../database/books.php');

	if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
  else if( !$_SESSION['admin'] )
  {
    header("Location: " . $BASE_URL . '/pages/books/list_books.php?');
    exit;
  }

  /* página atual */
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  
  /* número de livros por página */
  $n_books_per_page = 10;

  /* controlo icons previous/next */
  $number_of_books = getNoBooks();
  $max_no_page = $number_of_books[0]['count'] / $n_books_per_page;
  if ($page >= $max_no_page)
    $next = "NOTHING_TO_SHOW";
  else
    $next = $page + 1;
  $previous = $page - 1;
  
  print_r("number of books" .$number_of_books[0]['count']);
  print_r("------".$max_no_page);
  for ($i=1; $i<=$max_no_page; $i++){
	  print_r("$i----");
  }
  
  $max_no_page = ceil($max_no_page);
  print_r("-----".$max_no_page);

  $books = getSomeBooks($n_books_per_page, ($page-1)*$n_books_per_page, true); //getSomeBooks(limit, offset)

  $smarty->assign('BOOKS', $books);
  $smarty->assign('MAX_NO_PAGE', $max_no_page);
  $smarty->assign('PAGE', $page);
  $smarty->assign('NEXT', $next);
  $smarty->assign('PREVIOUS', $previous);

	$smarty->display('common/header.tpl');
	$smarty->display('users/stock_management.tpl');
	$smarty->display('common/footer.tpl');
?>
