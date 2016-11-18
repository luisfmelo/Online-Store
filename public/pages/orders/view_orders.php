<?php
  include_once('../../config/init.php');
  include_once('../../database/users.php');
  include_once('../../database/orders.php');
  include_once('../../database/books.php');

  if ( $_SESSION['username'] == '' )
  {
    header("Location: " . $BASE_URL . '/pages/users/login.php');
    exit;
  }
  $username = $_SESSION['username'];
  $isAdmin = $_SESSION['admin'];

  /* página atual */
  if(!isset($_GET['page']))
		$page = 0;
  else
		$page = $_GET['page'];

  /* controlo icons previous/next */
  $number_books_per_page = 10;
  $number_of_orders = getNoOrders($username, $isAdmin);
  $max_no_page = $number_of_orders[0]['count'] /  $number_books_per_page;

  if ($page + 1 > $max_no_page)
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
		$orders = getOrdersAdmin($number_books_per_page, $page * $number_books_per_page, $_GET['sort']);
  else
  	$orders = getOrdersCustomer($username,$number_books_per_page, $page * $number_books_per_page);
  	
  $smarty->assign('ORDERS', $orders);
  $smarty->assign('ISADMIN', $isAdmin);
  $smarty->display('common/header.tpl');
  $smarty->display('common/left_menu.tpl');
  $smarty->display('orders/view_orders.tpl');
  $smarty->display('common/footer.tpl');

?>


