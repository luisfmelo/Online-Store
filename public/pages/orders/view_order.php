<?php
  include_once('../../config/init.php');
  include_once('../../database/users.php');
  include_once('../../database/orders.php');

  $_SESSION['redirect'] = $BASE_URL . "/" . $BASE_URL . $_SERVER['REQUEST_URI'];

  if ( $_SESSION['username'] == '' )
  {
	  print_r("not");
    //~ header("Location: " . $BASE_URL . '/pages/users/login.php');
    //~ exit;
  }
  else if( !$_SESSION['admin'] && $_SESSION['username'] == $order['username'])
  {
  	header("Location: " . $BASE_URL . '/pages/books/list_books.php?');
    exit;
  }

  $id = $_GET['id'];
  $order = getOrderInfo($id);

  $smarty->assign('ORDER', $order);
  $smarty->assign('ID', $id);

  $smarty->display('common/header.tpl');
  $smarty->display('orders/view_order.tpl');
  $smarty->display('common/footer.tpl');

?>
