<?php
  include_once('../../config/init.php');
  include_once('../../database/users.php');
  include_once('../../database/orders.php');
  include_once('../../database/books.php');

  $_SESSION['redirect'] = $BASE_URL . "/" . $BASE_URL . $_SERVER['REQUEST_URI'];

  if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
  $username = $_SESSION['username'];
  $isAdmin = $_SESSION['admin'];

  /* página atual */
  if(!isset($_GET['page']))
		$page = 1;
  else
		$page = $_GET['page'];

  /* controlo icons previous/next */
  $number_books_per_page = 7;
  $number_of_orders = getNoOrders($username, $isAdmin);
  $max_no_page = $number_of_orders[0]['count'] /  $number_books_per_page;

  if ($page > $max_no_page)
		$next = "NOTHING_TO_SHOW";
  else
		$next = $page + 1;

  $previous = $page - 1;

	$sort 			= isset($_GET['sort']) ?  $_GET['sort'] :
																				"-";
	$sortParams = isset($_GET['sort']) ?  "&sort=$sort" :
																				"";
  /* obter encomendas conforme se trate de um cliente ou admin */
  if ($isAdmin)
		$orders = getOrdersAdmin($number_books_per_page, ($page-1) * $number_books_per_page, $_GET['sort']);
  else
  	$orders = getOrdersCustomer($username,$number_books_per_page, ($page-1) * $number_books_per_page);

  $smarty->assign('page', $page);
  $smarty->assign('next', $next);
  $smarty->assign('previous', $previous);
  $smarty->assign('max_no_page', $max_no_page);

  $smarty->assign('ORDERS', $orders);
  $smarty->assign('ISADMIN', $isAdmin);

  $smarty->display('common/header.tpl');
  $smarty->display('orders/view_orders.tpl');
  $smarty->display('common/footer.tpl');

?>
