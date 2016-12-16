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
  if(!isset($_GET['page']))
		$page = 0;
  else
		$page = $_GET['page'];

  /* controlo icons previous/next */
  $limit = 10;
  $number_of_books = getNoBooks();
  $max_no_page = $number_of_books[0]['count'] / $limit;

  if ($page + 1 > $max_no_page)
		$next = "NOTHING_TO_SHOW";
  else
		$next = $page + 1;

  $previous = $page - 1;

  $books = getSomeBooks($limit, $page*$limit, true); //getSomeBooks(limit, offset)

  $smarty->assign('BOOKS', $books);
  $smarty->assign('MAX_NO_PAGE', $max_no_page);
  $smarty->assign('PAGE', $page);
  $smarty->assign('NEXT', $next);
  $smarty->assign('PREVIOUS', $previous);

	$smarty->display('common/header.tpl');
	$smarty->display('users/stock_management.tpl');
	$smarty->display('common/footer.tpl');
?>
